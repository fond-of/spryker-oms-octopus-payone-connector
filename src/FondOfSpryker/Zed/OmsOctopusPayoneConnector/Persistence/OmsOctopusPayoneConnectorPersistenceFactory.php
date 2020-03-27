<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence;

use Orm\Zed\Payment\Persistence\SpySalesPaymentQuery;
use Orm\Zed\Payone\Persistence\SpyPaymentPayoneQuery;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemMetadataQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use Spryker\Zed\SalesProductConnector\SalesProductConnectorDependencyProvider;


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
