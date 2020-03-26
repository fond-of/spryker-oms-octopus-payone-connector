<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business\Expander;

use Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;

class OctopusOrderPaymentItemExpander implements OctopusOrderPaymentItemExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\PaymentTransfer $paymentTransfer
     * @param \Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer $octopusOrderPaymentItemTransfer
     *
     * @return \Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer
     */
    public function expandPaymentItem(
        PaymentTransfer $paymentTransfer,
        OctopusOrderPaymentItemTransfer $octopusOrderPaymentItemTransfer
    ): OctopusOrderPaymentItemTransfer {

        return $octopusOrderPaymentItemTransfer;
    }
}
