<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('tomato-branches::global.companies.single')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.companies.update', $model->id)}}" method="post" :default="$model">

        <x-splade-file filepond preview name="logo" />
        <x-splade-select
            :label="__('tomato-branches::global.companies.country')"
            :placeholder="__('tomato-branches::global.companies.country')"
            name="country_id"
            :remote-url="route('admin.countries.api')"
            remote-root="data"
            option-label="name"
            option-value="id"
            choices
        />
          <x-splade-input :label="__('tomato-branches::global.companies.name')" name="name" type="text"  :placeholder="__('tomato-branches::global.companies.name')" required/>
          <x-splade-input :label="__('tomato-branches::global.companies.ceo')" name="ceo" type="text"  :placeholder="__('tomato-branches::global.companies.ceo')" />
          <x-splade-input :label="__('tomato-branches::global.companies.address')" name="address" type="text"  :placeholder="__('tomato-branches::global.companies.address')" />
          <x-splade-input :label="__('tomato-branches::global.companies.city')" name="city" type="text"  :placeholder="__('tomato-branches::global.companies.city')" />
          <x-splade-input :label="__('tomato-branches::global.companies.zip')" name="zip" type="text"  :placeholder="__('tomato-branches::global.companies.zip')" />
          <x-splade-input :label="__('tomato-branches::global.companies.registration_number')" name="registration_number" type="text"  :placeholder="__('tomato-branches::global.companies.registration_number')" />
          <x-splade-input :label="__('tomato-branches::global.companies.tax_number')" name="tax_number" type="text"  :placeholder="__('tomato-branches::global.companies.tax_number')" />
          <x-splade-input :label="__('tomato-branches::global.companies.email')" name="email" type="email"  :placeholder="__('tomato-branches::global.companies.email')" />
        <x-splade-input :label="__('tomato-branches::global.companies.phone')" :placeholder="__('tomato-branches::global.companies.phone')" type='tel' name="phone" />
          <x-splade-input :label="__('tomato-branches::global.companies.website')" name="tomato-branches::global.companies.website" type="text"  :placeholder="__('Website')" />
          <x-splade-textarea :label="__('tomato-branches::global.companies.notes')" name="notes" :placeholder="__('tomato-branches::global.companies.notes')" autosize />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit label="{{__('tomato-admin::global.save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.companies.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('tomato-admin::global.delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.companies.index')" label="{{__('tomato-admin::global.cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
