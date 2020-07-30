<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Communication\Plugin\OmsOctopusConnectorExtension;

use FondOfSpryker\Zed\OmsOctopusConnectorExtension\Dependency\Plugin\OctopusOrderPaymentItemTransferExpanderPluginInterface;
use Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business\OmsOctopusPayoneConnectorFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\OmsOctopusPayoneConnector\OmsOctopusPayoneConnectorConfig getConfig()
 * @method \FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence\OmsOctopusPayoneConnectorQueryContainerInterface getQueryContainer()
 */
class PayoneOctopusOrderPaymentItemTransferExpanderPlugin extends AbstractPlugin implements OctopusOrderPaymentItemTransferExpanderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer $octopusOrderPaymentItemTransfer
     * @param \Generated\Shared\Transfer\PaymentTransfer $paymentTransfer
     *
     * @return \Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer
     */
    public function expandOctopusOrderPaymentItemTransfer(
        OctopusOrderPaymentItemTransfer $octopusOrderPaymentItemTransfer,
        PaymentTransfer $paymentTransfer
    ): OctopusOrderPaymentItemTransfer {
        return $this->getFacade()
            ->expandOctopusOrderPaymentItemTransfer($octopusOrderPaymentItemTransfer, $paymentTransfer);
    }
}
