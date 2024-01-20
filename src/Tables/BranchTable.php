<?php

namespace TomatoPHP\TomatoBranches\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Illuminate\Database\Eloquent\Builder;
use TomatoPHP\TomatoRoles\Services\TomatoRoles;

class BranchTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(public mixed $query)
    {
        if(!$this->query){
            $this->query = \TomatoPHP\TomatoBranches\Models\Branch::query();
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
            return auth('web')->user()->can('admin.branches.index');
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
                columns: ['id','name','phone',]
            )

            ->defaultSort('id', 'desc')
            ->column(
                key: 'id',
                label: __('tomato-branches::global.branches.id'),
                hidden: true,
                sortable: true
            )
            ->column(
                key: 'branch_number',
                label: __('tomato-branches::global.branches.branch_number'),
                sortable: true
            )
            ->column(
                key: 'company.name',
                label: __('tomato-branches::global.branches.single'),
                sortable: true
            )
            ->column(
                key: 'name',
                label: __('tomato-branches::global.branches.name'),
                sortable: true
            )
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->paginate(10);



        if(auth('web')->user() && class_exists(TomatoRoles::class)){
            if(auth('web')->user()->can('admin.branches.export')){
                $table->export();
            }
            if(auth('web')->user()->can('admin.branches.destroy')){
                $table->bulkAction(
                    label: trans('tomato-admin::global.crud.delete'),
                    each: fn (\TomatoPHP\TomatoBranches\Models\Branch $model) => $model->delete(),
                    after: fn () => Toast::danger(__('tomato-branches::global.branches.messages.deleted'))->autoDismiss(2),
                    confirm: true
                );
            }
        }
        else {
            $table->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: fn (\TomatoPHP\TomatoBranches\Models\Branch $model) => $model->delete(),
                after: fn () => Toast::danger(__('tomato-branches::global.branches.messages.deleted'))->autoDismiss(2),
                confirm: true
            );
            $table->export();
        }
    }
}
