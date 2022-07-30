@extends("themes.frontend.master")

@section("page_title")
{{ $title ?? "" }}
@endsection

@push("custom_css")

@section("custom_styles")
<style type="text/css">
    .text-facebook,
    .hover-facebook-text:hover i,
    .hover-facebook a:hover i {
        color: #3b5998;
    }

    .bg-facebook,
    .btn-facebook {
        background-color: #3b5998;
        color: #fff;
    }

    .text-twitter,
    .hover-twitter-text:hover i,
    .hover-twitter a:hover i {
        color: #00aced;
    }

    .bg-twitter,
    .btn-twitter {
        background-color: #00aced;
        color: #fff;
    }

    .text-instagram,
    .hover-instagram-text:hover i,
    .hover-instagram a:hover i {
        color: #b300ad;
    }

    .bg-instagram,
    .btn-instagram {
        background-color: #b300ad;
        color: #fff;
    }

    .text-youtube,
    .hover-youtube-text:hover i,
    .hover-youtube a:hover i {
        color: #bd0000;
    }

    .bg-youtube,
    .btn-youtube {
        background-color: #bd0000;
        color: #fff;
    }

    .text-gplus,
    .hover-gplus-text:hover i,
    .hover-gplus a:hover i {
        color: #eb5e4c;
    }

    .bg-gplus,
    .btn-gplus {
        background-color: #eb5e4c;
        color: #fff;
    }

    .text-vimeo,
    .hover-vimeo-text:hover i,
    .hover-vimeo a:hover i {
        color: #35c6ea;
    }

    .bg-vimeo,
    .btn-vimeo {
        background-color: #35c6ea;
        color: #fff;
    }

    .text-envelope,
    .hover-envelope-text:hover i,
    .hover-envelope a:hover i {
        color: #faa33d;
    }

    .bg-envelope,
    .btn-envelope {
        background-color: #faa33d;
        color: #fff;
    }

    .text-linkedin,
    .hover-linkedin-text:hover i,
    .hover-linkedin a:hover i {
        color: #6697ff;
    }

    .bg-linkedin,
    .btn-linkedin {
        background-color: #6697ff;
        color: #fff;
    }

    .text-telegram,
    .hover-telegram-text:hover i,
    .hover-telegram a:hover i {
        color: #30a8dc;
    }

    .bg-telegram,
    .btn-telegram {
        background-color: #30a8dc;
        color: #fff;
    }

    .text-pinterest,
    .hover-pinterest-text:hover i,
    .hover-pinterest a:hover i {
        color: #bd081b;
    }

    .bg-pinterest,
    .btn-pinterest {
        background-color: #bd081b;
        color: #fff;
    }

    .black a {
        color: #000;
    }

    .post-content ul {
        color: #474b5f;
    }

    .white a {
        color: #fff;
    }


    .sidebar-item.active,
    .sidebar-item:hover {
        background-color: #fff;
        border: 1px solid #e6e7e9;
        border-right: 0;
        margin-right: -1px;
    }

    .sidebar-menu {
        border-bottom: 1px solid #e6e7e9;
        border-top: 1px solid #e6e7e9;
        border-right: 1px solid #e6e7e9;
        padding-bottom: 1rem;
        padding-top: 1rem;
        background-color: #f4f4f4;
    }

    .sidebar-item {
        position: relative;
        display: block;
        padding: 0.75rem 1.25rem;
        margin-bottom: 0.5rem;
        border: 1px solid transparent;
    }

    .sidebar-item.active:hover {
        background-color: #fff;
    }

    .card .icon-big {
        font-size: 3rem;
    }

    .card .icon-big .notif {
        position: absolute;
        min-width: 25px;
        border-radius: 5rem;
        font-size: 1rem;
        background: #dc3545;
        color: #fff;
    }

    .card .numbers {
        text-align: right;
    }

    .card .numbers p {
        font-size: 1rem;
        margin: 0;
    }

    .card .footer {
        padding: 0;
        line-height: 30px;
    }

    .side-notif {
        padding-left: 7px;
        padding-right: 7px;
        font-size: 0.8rem;
        border-radius: 5rem;
        background-color: #dc3545;
        color: #fff;
    }

    .statistics li {
        padding: 0.25rem 0;
    }

    .member-item:hover .card {
        background-color: #f4f4f4;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f4f4f4;
    }

    @media (max-width: 767.98px) {

        .sidebar-item.active,
        .sidebar-item:hover {
            border-right: 1px solid #e6e7e9;
            margin-left: 0.25rem;
            margin-right: 0.25rem;
        }
    }
</style>

@endpush

@section("content")
<div class="container emp-profile">
    <section id="about-us" class="py-5">
        <div class="container">
            <div class="row">
                <x-public-profile></x-public-profile>
                <!--Content-->
                <div class="col-md-9">
                    <div class="dashboard-area">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection