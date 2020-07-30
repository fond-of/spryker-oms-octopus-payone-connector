<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector;

use FondOfSpryker\Shared\OmsOctopusPayoneConnector\OmsOctopusPayoneConnectorConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class OmsOctopusPayoneConnectorConfig extends AbstractBundleConfig
{
    /**
     * @return int
     */
    public function getFeeAmount(): int
    {
        return $this->get(OmsOctopusPayoneConnectorConstants::FEE_AMOUNT, 0);
    }

    /**
     * @return string[]
     */
    public function getFeeIssuers(): array
    {
        return $this->get(OmsOctopusPayoneConnectorConstants::FEE_ISSUERS, []);
    }
}
