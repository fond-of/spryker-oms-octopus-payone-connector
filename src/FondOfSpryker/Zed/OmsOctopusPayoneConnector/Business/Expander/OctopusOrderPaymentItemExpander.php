<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business\Expander;

use FondOfSpryker\Zed\OmsOctopusPayoneConnector\OmsOctopusPayoneConnectorConfig;
use FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence\OmsOctopusPayoneConnectorQueryContainerInterface;
use Generated\Shared\Transfer\OctopusOrderPaymentItemFeeTransfer;
use Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Orm\Zed\Payment\Persistence\SpySalesPayment;
use Orm\Zed\Payone\Persistence\SpyPaymentPayone;
use SprykerEco\Shared\Payone\PayoneApiConstants;

class OctopusOrderPaymentItemExpander implements OctopusOrderPaymentItemExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\OmsOctopusPayoneConnector\OmsOctopusPayoneConnectorConfig
     */
    protected $octopusPayoneConnectorConfig;

    /**
     * @var \FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence\OmsOctopusPayoneConnectorQueryContainerInterface
     */
    protected $omsOctopusPayoneConnectorQueryContainer;

    /**
     * @param \FondOfSpryker\Zed\OmsOctopusPayoneConnector\OmsOctopusPayoneConnectorConfig $octopusPayoneConnectorConfig
     * @param \FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence\OmsOctopusPayoneConnectorQueryContainerInterface $omsOctopusPayoneConnectorQueryContainer
     */
    public function __construct(
        OmsOctopusPayoneConnectorConfig $octopusPayoneConnectorConfig,
        OmsOctopusPayoneConnectorQueryContainerInterface $omsOctopusPayoneConnectorQueryContainer
    ) {
        $this->octopusPayoneConnectorConfig = $octopusPayoneConnectorConfig;
        $this->omsOctopusPayoneConnectorQueryContainer = $omsOctopusPayoneConnectorQueryContainer;
    }

    /**
     * @param \Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer $octopusOrderPaymentItemTransfer
     * @param \Generated\Shared\Transfer\PaymentTransfer $paymentTransfer
     *
     * @return \Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer
     */
    public function expandOctopusOrderPaymentItemTransferWithPayoneTransactionId(
        OctopusOrderPaymentItemTransfer $octopusOrderPaymentItemTransfer,
        PaymentTransfer $paymentTransfer
    ): OctopusOrderPaymentItemTransfer {
        if (
            $paymentTransfer->getPaymentMethod() !== PayoneApiConstants::PAYMENT_METHOD_E_WALLET
            && $paymentTransfer->getPaymentMethod() !== PayoneApiConstants::PAYMENT_METHOD_CREDITCARD
        ) {
            return $octopusOrderPaymentItemTransfer;
        }

        $octopusOrderPaymentItemTransfer->setTransactionId($this->getPaymentTransactionId($paymentTransfer));
        $octopusOrderPaymentItemTransfer->addFee(
            $this->getFee($paymentTransfer)
        );

        return $octopusOrderPaymentItemTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PaymentTransfer $paymentTransfer
     *
     * @return \Generated\Shared\Transfer\OctopusOrderPaymentItemFeeTransfer
     */
    protected function getFee(PaymentTransfer $paymentTransfer): OctopusOrderPaymentItemFeeTransfer
    {
        $octopusOrderPaymentItemFeeTransfer = new OctopusOrderPaymentItemFeeTransfer();
        $feeIssuers = $this->octopusPayoneConnectorConfig->getFeeIssuers();
        $octopusOrderPaymentItemFeeTransfer->setAmount($this->octopusPayoneConnectorConfig->getFeeAmount());

        if (isset($feeIssuers[$paymentTransfer->getPaymentMethod()])) {
            $octopusOrderPaymentItemFeeTransfer->setIssuer(
                $feeIssuers[$paymentTransfer->getPaymentMethod()]
            );
        }

        return $octopusOrderPaymentItemFeeTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PaymentTransfer $paymentTransfer
     *
     * @return string
     */
    protected function getPaymentTransactionId(PaymentTransfer $paymentTransfer): string
    {
        $salesPaymentEntity = $this->getSalesPaymentEntityByIdSalesPayment($paymentTransfer->getIdSalesPayment());

        $paymentPayoneEntity = $this->getPaymentPayoneEntityByIdSalesOrder($salesPaymentEntity->getFkSalesOrder());

        if ($paymentPayoneEntity->getTransactionId() === null) {
            return '';
        }

        return (string)$paymentPayoneEntity->getTransactionId();
    }

    /**
     * @param int $idSalesPayment
     *
     * @return \Orm\Zed\Payment\Persistence\SpySalesPayment
     */
    protected function getSalesPaymentEntityByIdSalesPayment(int $idSalesPayment): SpySalesPayment
    {
        return $this->omsOctopusPayoneConnectorQueryContainer
            ->querySalesPaymentByIdSalesPayment($idSalesPayment)
            ->findOne();
    }

    /**
     * @param int $idSalesOrder
     *
     * @return \Orm\Zed\Payone\Persistence\SpyPaymentPayone
     */
    protected function getPaymentPayoneEntityByIdSalesOrder(int $idSalesOrder): SpyPaymentPayone
    {
        return $this->omsOctopusPayoneConnectorQueryContainer
            ->queryPaymentPayoneByIdSalesOrder($idSalesOrder)
            ->findOne();
    }
}
