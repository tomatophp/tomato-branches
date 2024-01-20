<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{__('tomato-branches::global.companies.index')}} #{{$model->id}}">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        
          <x-tomato-admin-row :label="__('tomato-branches::global.companies.country')" :value="$model->Country->name" type="text" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.name')" :value="$model->name" type="string" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.ceo')" :value="$model->ceo" type="string" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.address')" :value="$model->address" type="string" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.city')" :value="$model->city" type="string" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.zip')" :value="$model->zip" type="string" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.registration_number')" :value="$model->registration_number" type="string" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.tax_number')" :value="$model->tax_number" type="string" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.email')" :value="$model->email" type="email" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.phone')" :value="$model->phone" type="tel" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.website')" :value="$model->website" type="string" />

          <x-tomato-admin-row :label="__('tomato-branches::global.companies.notes')" :value="$model->notes" type="text" />

    </div>
    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('tomato-admin::global.crud.edit')}}" :href="route('admin.companies.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.companies.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete"  label="{{__('tomato-admin::global.crud.delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.companies.index')" label="{{__('tomato-admin::global.cancel')}}"/>
    </div>
</x-tomato-admin-container>
