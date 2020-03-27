<?php

namespace FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence;

use FondOfSpryker\Zed\OmsOctopusPayoneConnector\Business\OmsOctopusPayoneConnectorFacadeInterface;
use Orm\Zed\Payment\Persistence\SpySalesPaymentQuery;
use Orm\Zed\Payone\Persistence\Base\SpyPaymentPayone;
use Orm\Zed\Payone\Persistence\SpyPaymentPayoneQuery;
use SprykerEco\Zed\Payone\Persistence\PayoneQueryContainer as SprykerEcoPayoneQueryContainer;

/**
 * @method \FondOfSpryker\Zed\OmsOctopusPayoneConnector\Persistence\OmsOctopusPayoneConnectorPersistenceFactory getFactory()
 */
class OmsOctopusPayoneConnectorQueryContainer extends SprykerEcoPayoneQueryContainer implements OmsOctopusPayoneConnectorQueryContainerInterface
{
    /**
     * @param int $idSalesPayment
     *
     * @return \Orm\Zed\Payment\Persistence\SpySalesPaymentQuery
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function querySalesPaymentByIdSalesPayment(int $idSalesPayment): SpySalesPaymentQuery
    {
        return $this->getFactory()->createSalesPaymentQuery()
            ->filterByIdSalesPayment($idSalesPayment);
    }

    /**
     * @param int $idSalesOrder
     * @return \Orm\Zed\Payone\Persistence\SpyPaymentPayoneQuery
     * 
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function queryPaymentPayoneByIdSalesOrder(int $idSalesOrder): SpyPaymentPayoneQuery
    {
        return $this->getFactory()->createPaymentPayoneQuery()
            ->filterByFkSalesOrder($idSalesOrder);
    }
}
