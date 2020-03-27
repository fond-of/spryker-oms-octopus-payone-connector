<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business;

use FondOfSpryker\Zed\BrandCompany\Business\Expander\BrandExpander;
use FondOfSpryker\Zed\BrandCompany\Business\Expander\BrandExpanderInterface;
use FondOfSpryker\Zed\BrandCompany\Business\Model\BrandCompanyRelationReader;
use FondOfSpryker\Zed\BrandCompany\Business\Model\BrandCompanyRelationReaderInterface;
use FondOfSpryker\Zed\BrandCompany\Business\Model\BrandCompanyRelationWriter;
use FondOfSpryker\Zed\BrandCompany\Business\Model\BrandCompanyRelationWriterInterface;
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
