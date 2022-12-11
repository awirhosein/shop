<div class="dropdown d-flex justify-content-end pointer">
    <i class="fas fa-ellipsis-vertical px-2" style="font-size:20px" data-toggle="dropdown" class="pointer"></i>

    <div class="dropdown-menu mt-2 p-0">
        @isset($edit)
            <a href="{{ $edit }}" class="text-dark w-100 d-flex align-items-center p-2 pr-3">
                <i class="far fa-edit"></i>
                <span class="mr-3" style="font-size:14px">{{ __('Edit') }}</span>
            </a>

            <div class="dropdown-divider m-0"></div>
        @endisset

        @isset($delete)
            <form action="{{ $delete }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="w-100 d-flex align-items-center m-0 p-2 pr-3 confirm-delete">
                    <i class="far fa-trash-alt"></i>
                    <span class="mr-3" style="font-size:14px">{{ __('Delete') }}</span>
                </div>
            </form>
        @endisset
    </div>
</div>