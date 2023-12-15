<?php

namespace TomatoPHP\TomatoBranches\Models;

use Illuminate\Database\Eloquent\Model;
use TomatoPHP\TomatoInvoices\Models\Invoice;
use TomatoPHP\TomatoOrders\Models\Order;

/**
 * @property integer $id
 * @property string $name
 * @property Company $company_id
 * @property int $branch_number
 * @property string $phone
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 * @property Invoice[] $invoices
 * @property Order[] $orders
 */
class Branch extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['company_id', 'branch_number','name', 'phone', 'address', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function company()
    {
        return $this->belongsTo('TomatoPHP\TomatoBranches\Models\Company');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
