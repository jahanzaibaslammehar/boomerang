<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\CustomerRepository;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends AbstractService
{

    public function __construct(CustomerRepository $repository, private CustomerRebateService $rebateService, private CustomerTradeService $tradeService)
    {
        $this->repository = $repository;
    }

    public function create(array $data) : Model
    {

        try{
            $this->repository->beginTransaction();

            $customer = parent::create($data);

            if(isset($data['is_rebate']) && $data['is_rebate']) {

                //add customer_id in rebate_items array
                $rebateItems = $data['rebate_items'];
                foreach($rebateItems as &$item) {
                    $item['customer_id'] = $customer->id;
                }

                $this->rebateService->createMany($rebateItems);

            }

            if(isset($data['is_trade']) && $data['is_trade']) {

                //add customer_id in trade_items array
                $tradeItems = $data['trade_items'];
                foreach($tradeItems as &$item) {
                    $item['customer_id'] = $customer->id;
                }

                $this->tradeService->createMany($tradeItems);

            }

            $this->repository->endTransaction();
            $customer->load(['rebates', 'trades']);
            return $customer;
        } catch (\Exception $e) {
            $this->repository->revertTransaction();
            throw $e;
        }
    }
}