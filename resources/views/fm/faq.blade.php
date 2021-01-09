@include('auth.head')
@include('fm.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Frequently Asked Questions</h4>
                    </div>
                    <div class="card-body">
                        @forelse($faqs as $faq)
                        <!--Accordion wrapper-->
                        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                            <!-- Accordion card -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingOne1">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                                       aria-controls="collapseOne1">
                                        <h5 class="mb-0">
                                            {{ $faq->question }} <i class="fas fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>

                                <!-- Card body -->
                                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                                     data-parent="#accordionEx">
                                    <div class="card-body">
                                       {{ $faq->answer }}
                                    </div>
                                </div>

                            </div>
                            <!-- Accordion card -->
                        </div>
                        <!-- Accordion wrapper -->
                            @empty
                        No FAQ Yet.
                        @endforelse
                    </div>
                </div>
    </div>
</div>


@include('auth.foot')
