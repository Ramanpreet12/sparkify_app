<div class="intro-y box mt-5">
    <div class="relative flex items-center p-5">
        <div class="w-12 h-12 image-fit">
            @if (!empty(Auth::user()->photo) && Storage::exists('storage/admin_profile_photo/'. Auth::user()->photo))
                <img alt="Admin Image" class="rounded-full"
                    src="{{ asset('storage/admin_profile_photo/' . Auth::user()->photo) }}">
            @else
                <img alt="Admin Image" class="rounded-full"
                    src="{{ asset('dist/images/dummy_image.webp') }}">
            @endif

        </div>
        <div class="ml-4 mr-auto">
            <div class="font-medium text-base">{{ Auth::user()->name }}</div>
            <div class="text-slate-500">{{ Auth::user()->role_as == 0 ? 'Admin' : '' }}</div>
        </div>
    </div>
    <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
        @if (Session::has('page' == 'profile'))
        @php
            $active = 'text-primary';
        @endphp
    @else
        @php
            $active = '';
        @endphp
    @endif

        <a class="flex items-center {{$active }} font-medium" href="{{ route('admin/profile') }}">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information
        </a>

        @if (Session::has('page' == 'password'))
            @php
                $active = 'text-primary';
            @endphp
        @else
            @php
                $active = '';
            @endphp
        @endif

        <a class="flex items-center {{$active }} mt-5" href="">
            <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password
        </a>

    </div>

</div>
