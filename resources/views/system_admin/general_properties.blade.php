@extends('layouts.admin')
@section('page_content')
    @component('components.ShowCard',[
 'Disname'=>'الخصائص العامة',
 'Disinfo'=>'ادارة الخصائص العامة للموقع',
 'actions'=>[]
 ])
        <div class="row">
            @component('components.dash.card',[
                           'url'=>route('system.categories.index'),
                           'icon'=>'fa fa-list',
                           'name'=>'التصنيفات ',
                           'count'=>$categories.' تصنيف',
                           'col'=>3

           ])@endcomponent

                @component('components.dash.card',[
                              'url'=>route('system.colors.index'),
                              'icon'=>'fa fa-list',
                              'name'=>'الالوان ',
                              'count'=>$colors.' لون',
                              'col'=>3

              ])@endcomponent

                @component('components.dash.card',[
                              'url'=>route('system.trademarks.index'),
                              'icon'=>'fa fa-list',
                              'name'=>'العلامات التجارية ',
                              'count'=>$trademarks.' علامة تجارية',
                              'col'=>3

              ])@endcomponent

                @component('components.dash.card',[
                              'url'=>route('system.operates.index'),
                              'icon'=>'fa fa-list',
                              'name'=>'متطلبات التشغيل ',
                              'count'=>$operates.' متطلب تشغيل',
                              'col'=>3

              ])@endcomponent


                 

              

        </div>


    @endcomponent


@endsection
@section('custom_scripts')
    <script>
        $(function () {

        })
    </script>

@endsection
