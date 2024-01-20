<?php

namespace TomatoPHP\TomatoBranches\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Illuminate\Database\Eloquent\Builder;
use TomatoPHP\TomatoRoles\Services\TomatoRoles;

class CompanyTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(public mixed $query)
    {
        if(!$this->query){
            $this->query = \TomatoPHP\TomatoBranches\Models\Company::query();
        }
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        if(auth('web')->user() && class_exists(TomatoRoles::class)){
            return auth('web')->user()->can('admin.compaines.index');
        }
        else {
            return true;
        }
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return $this->query;
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(
                label: trans('tomato-admin::global.search'),
                columns: ['id','name','email','phone',]
            )
            ->defaultSort('id', 'desc')
            ->column(
                key: 'id',
                label: __('tomato-branches::global.companies.id'),
                hidden: false,
                sortable: true
            )
            ->column(
                key: 'country.name',
                label: __('tomato-branches::global.companies.single'),
                sortable: true
            )
            ->column(
                key: 'name',
                label: __('tomato-branches::global.companies.name'),
                sortable: true
            )
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->paginate(10);

        if(auth('web')->user() && class_exists(TomatoRoles::class)){
            if(auth('web')->user()->can('admin.companies.export')){
                $table->export();
            }
            if(auth('web')->user()->can('admin.companies.destroy')){
                $table->bulkAction(
                    label: trans('tomato-admin::global.crud.delete'),
                    each: fn (\TomatoPHP\TomatoBranches\Models\Company $model) => $model->delete(),
                    after: fn () => Toast::danger(__('tomato-branches::global.companies.messages.deleted'))->autoDismiss(2),
                    confirm: true
                );
            }
        }
        else {
            $table->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: fn (\TomatoPHP\TomatoBranches\Models\Company $model) => $model->delete(),
                after: fn () => Toast::danger(__('tomato-branches::global.companies.messages.deleted'))->autoDismiss(2),
                confirm: true
            );
            $table->export();
        }
    }
}
