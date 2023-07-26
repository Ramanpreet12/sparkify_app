@extends('../layout/' . $layout)

@section('subhead')
    <title>Sparkify | Category Managment</title>
@endsection

@section('subcontent')
@if (session()->has('success_msg'))
<div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
        class="bi bi-check2-circle" viewBox="0 0 16 16">
        <path
            d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
        <path
            d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
    </svg>
    &nbsp; {{ session()->get('success_msg') }}
</div>

@endif

@if (session('error_msg'))
<div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-alert-octagon w-6 h-6 mr-2">
        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
        <line x1="12" y1="8" x2="12" y2="12"></line>
        <line x1="12" y1="16" x2="12.01" y2="16"></line>
    </svg>
    {{ session('error_msg') }}
</div>
@endif

    {{-- <h2 class="intro-y text-lg font-medium mt-10">Banners Management</h2> --}}
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Category Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="btn btn-primary shadow-md mr-2" href="{{route('manage_category.create')}}">Add New Category</a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="category_table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center whitespace-nowrap">S.No.</th>
                        <th class="text-center whitespace-nowrap">Parent Category Name</th>
                        <th class="text-center whitespace-nowrap">Category Name</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Created At</th>
                        <th class="text-center whitespace-nowrap">Updated At</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($categories->isNotEmpty())


                    @forelse ($categories as $category)
                        <tr class="intro-x">
                            <td  class="text-center">
                                <div class="text-slate-500 font-medium whitespace-nowrap mx-4"> {{$loop->iteration}}</div>
                            </td>

                            <td class="text-center"> {{$category->name}}</td>

                            <td class="w-40">

                                <div class="flex items-center justify-center {{ $category->status =='active' ? 'text-success' : 'text-danger' }}">
                                    <i data-feather={{ $category->status =='active' ? 'toggle-left' : 'toggle-right' }} class="w-4 h-4 mr-2"></i> {{ $category->status =='active' ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            <td class="text-center">{{\Carbon\Carbon::parse($category->created_at)->format('j F , Y , H:i')}}</td>
                            <td class="text-center">{{\Carbon\Carbon::parse($category->updated_at)->format('j F , Y , H:i')}}</td>



                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{route('category.edit',$category->id)}}">
                                        <i data-feather="edit" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <form action="{{route('category.destroy', $category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-danger show_sweetalert" type="submit" data-toggle="tooltip">  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>
                                      </form>
                                </div>
                            </td>


                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No Records found</td>

                        </tr>
                    @endforelse
                    @endif
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

    </div>


@endsection

@push('script')
<script>
 $(function() {
   $('#category_table').DataTable();
 });
</script>



<script type="text/javascript">

    $('.show_sweetalert').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "It will gone forever",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>


@endpush
