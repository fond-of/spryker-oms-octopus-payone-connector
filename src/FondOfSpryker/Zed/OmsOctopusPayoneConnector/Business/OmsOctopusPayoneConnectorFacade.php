<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business;

use Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business\OmsOctopusPayoneConnectorBusinessFactory getFactory()
 */
class OmsOctopusPayoneConnectorFacade extends AbstractFacade implements OmsOctopusPayoneConnectorFacadeInterface
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
        return $this->getFactory()
            ->creatOctopusOrderPaymentItemExpander()
            ->expandOctopusOrderPaymentItemTransferWithPayoneTransactionId(
                $octopusOrderPaymentItemTransfer,
                $paymentTransfer
            );
    }
}
