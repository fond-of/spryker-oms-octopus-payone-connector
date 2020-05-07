<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence;

use Orm\Zed\Payment\Persistence\SpySalesPaymentQuery;
use Orm\Zed\Payone\Persistence\SpyPaymentPayoneQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence\OmsOctopusPayoneConnectorQueryContainer getQueryContainer()
 * @method \FondOfSpryker\Zed\OmsOctopusPayoneConnector\OmsOctopusPayoneConnectorConfig getConfig()
 */
class OmsOctopusPayoneConnectorPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Payment\Persistence\SpySalesPaymentQuery
     */
    public function createSalesPaymentQuery(): SpySalesPaymentQuery
    {
        return SpySalesPaymentQuery::create();
    }

    /**
     * @return \Orm\Zed\Payone\Persistence\SpyPaymentPayoneQuery
     */
    public function createPaymentPayoneQuery(): SpyPaymentPayoneQuery
    {
        return SpyPaymentPayoneQuery::create();
    }
}
