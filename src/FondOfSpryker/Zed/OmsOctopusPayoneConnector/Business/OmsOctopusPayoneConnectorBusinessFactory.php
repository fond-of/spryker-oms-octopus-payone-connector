<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business;

use FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business\Expander\OctopusOrderPaymentItemExpander;
use FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business\Expander\OctopusOrderPaymentItemExpanderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\OmsOctopusPayoneConnector\OmsOctopusPayoneConnectorConfig getConfig()
 * @method \FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence\OmsOctopusPayoneConnectorQueryContainer getQueryContainer()
 */
class OmsOctopusPayoneConnectorBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business\Expander\OctopusOrderPaymentItemExpanderInterface
     */
    public function creatOctopusOrderPaymentItemExpander(): OctopusOrderPaymentItemExpanderInterface
    {
        return new OctopusOrderPaymentItemExpander(
            $this->getConfig(),
            $this->getQueryContainer()
        );
    }
}
