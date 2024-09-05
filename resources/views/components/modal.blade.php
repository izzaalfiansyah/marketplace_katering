<!--begin::Modal - Create Project-->
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog">
        <!--begin::Modal content-->
        <div class="modal-content modal-rounded">
            <!--begin::Modal header-->
            @isset($header)
                <div class="modal-header">
                    <!--begin::Modal header-->
                    <h2>{{ $header }}</h2>
                    <!--end::Modal header-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
            @endisset
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y m-5">
                {{ $slot }}
            </div>
            <!--end::Modal body-->
            @isset($footer)
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endisset
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
