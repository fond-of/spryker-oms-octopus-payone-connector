<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business;

use Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;

interface OmsOctopusPayoneConnectorFacadeInterface
{
    /**
     * Specification:
     * - Expands OctopusOrderPaymentItemTransfer transfer with Payone Data
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer $octopusOrderPaymentItemTransfer
     * @param \Generated\Shared\Transfer\PaymentTransfer $paymentTransfer
     *
     * @return \Generated\Shared\Transfer\OctopusOrderPaymentItemTransfer
     */
    public function expandOctopusOrderPaymentItemTransfer(
        OctopusOrderPaymentItemTransfer $octopusOrderPaymentItemTransfer,
        PaymentTransfer $paymentTransfer
    ): OctopusOrderPaymentItemTransfer;
}
