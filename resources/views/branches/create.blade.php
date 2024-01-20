<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('tomato-branches::global.branches.single')}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.branches.store')}}" method="post">

          <x-splade-select
              choices
              :label="__('tomato-branches::global.branches.company_name')"
              name="company_id"
              :placeholder="__('tomato-branches::global.branches.company_name')"
              remote-root="data"
              remote-url="{{route('admin.companies.api')}}"
              option-label="name"
              option-value="id"
          />
          <x-splade-input :label="__('tomato-branches::global.branches.name')" name="name" type="text"  :placeholder="__('tomato-branches::global.branches.name')" />
          <x-splade-input :label="__('tomato-branches::global.branches.branch_number')" name="branch_number" type="number"  :placeholder="__('tomato-branches::global.branches.branch_number')" />
        <x-splade-input :label="__('tomato-branches::global.branches.phone')" :placeholder="__('tomato-branches::global.branches.phone')" type='tel' name="phone" />
          <x-splade-input :label="__('tomato-branches::global.branches.address')" name="address" type="text"  :placeholder="__('tomato-branches::global.branches.address')" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit label="{{__('tomato-admin::global.save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.branches.index')" label="{{__('tomato-admin::global.cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
