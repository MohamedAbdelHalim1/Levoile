@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabs</li>
                                </ol><!-- End breadcrumb -->
                                <div class="ms-auto">
                                    <div>
                                        <a href="javascript:void(0);" class="btn bg-secondary-transparent text-secondary btn-sm"
                                            data-bs-toggle="tooltip" title="" data-bs-placement="bottom"
                                            data-bs-original-title="Rating">
                                            <span>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </a>
                                        <a href="{{url('lockscreen')}}" class="btn bg-primary-transparent text-primary mx-2 btn-sm"
                                            data-bs-toggle="tooltip" title="" data-bs-placement="bottom"
                                            data-bs-original-title="lock">
                                            <span>
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </a>
                                        <a href="javascript:void(0);" class="btn bg-warning-transparent text-warning btn-sm" data-bs-toggle="tooltip"
                                            title="" data-bs-placement="bottom" data-bs-original-title="Add New">
                                            <span>
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- PAGE HEADER -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Default Tabs</h3>
                                        </div>
                                        <div class="card-body myTab">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#home"
                                                        role="tab" aria-controls="home" aria-selected="false">Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                        href="#profile" role="tab" aria-controls="profile"
                                                        aria-selected="false">Profile</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active show" id="contact-tab" data-bs-toggle="tab"
                                                        href="#contact" role="tab" aria-controls="contact"
                                                        aria-selected="true">Contact</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content border p-3" id="myTabContent">
                                                <div class="tab-pane fade p-0" id="home" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                    fugit,
                                                    sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
                                                    nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit
                                                    amet,
                                                    consectetur, adipisci velit, sed quia non numquam eius modi tempora
                                                    incidunt
                                                    ut labore et dolore magnam aliquam quaerat voluptatem.
                                                </div>
                                                <div class="tab-pane fade p-0" id="profile" role="tabpanel"
                                                    aria-labelledby="profile-tab">
                                                    No one rejects, dislikes, or avoids pleasure itself, because it is
                                                    pleasure,
                                                    but because those who do not know how to pursue pleasure rationally
                                                    encounter consequences that are extremely painful. Nor again is there
                                                    anyone
                                                    who loves or pursues or desires to obtain pain of itself, because it is
                                                    pain, but because occasionally circumstances occur in which toil and
                                                    pain
                                                    can procure him some great pleasure.
                                                </div>
                                                <div class="tab-pane fade p-0 active show" id="contact" role="tabpanel"
                                                    aria-labelledby="contact-tab">
                                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                                    blanditiis
                                                    praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                                    molestias excepturi sint occaecati cupiditate non provident, similique
                                                    sunt
                                                    in culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                                                    fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam
                                                    libero
                                                    tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                                    minus
                                                    id quod maxime placeat facere possimus, omnis voluptas assumenda est,
                                                    omnis
                                                    dolor repellendus.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Tabs with Vertical nav-pills</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-2 col-sm-12 col-md-2 col-xl-1">
                                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="home-tab4" data-bs-toggle="tab"
                                                                href="#home4" role="tab" aria-controls="home"
                                                                aria-selected="true">Home</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="profile-tab4" data-bs-toggle="tab"
                                                                href="#profile4" role="tab" aria-controls="profile"
                                                                aria-selected="false">Profile</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="contact-tab4" data-bs-toggle="tab"
                                                                href="#contact4" role="tab" aria-controls="contact"
                                                                aria-selected="false">Contact</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-10 col-sm-12 col-md-10 col-xl-11">
                                                    <div class="tab-content border p-3" id="myTab3Content">
                                                        <div class="tab-pane fade show active p-0" id="home4"
                                                            role="tabpanel" aria-labelledby="home-tab4">
                                                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                                                            aut
                                                            fugit, sed quia consequuntur magni dolores eos qui ratione
                                                            voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
                                                            ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                                            non
                                                            numquam eius modi tempora incidunt ut labore et dolore magnam
                                                            aliquam quaerat voluptatem.
                                                        </div>
                                                        <div class="tab-pane fade p-0" id="profile4" role="tabpanel"
                                                            aria-labelledby="profile-tab4">
                                                            No one rejects, dislikes, or avoids pleasure itself, because it
                                                            is
                                                            pleasure, but because those who do not know how to pursue
                                                            pleasure
                                                            rationally encounter consequences that are extremely painful.
                                                            Nor
                                                            again is there anyone who loves or pursues or desires to obtain
                                                            pain
                                                            of itself, because it is pain, but because occasionally
                                                            circumstances occur in which toil and pain can procure him some
                                                            great pleasure.
                                                        </div>
                                                        <div class="tab-pane fade p-0" id="contact4" role="tabpanel"
                                                            aria-labelledby="contact-tab4">
                                                            At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                                            blanditiis praesentium voluptatum deleniti atque corrupti quos
                                                            dolores et quas molestias excepturi sint occaecati cupiditate
                                                            non
                                                            provident, similique sunt in culpa qui officia deserunt mollitia
                                                            animi, id est laborum et dolorum fuga. Et harum quidem rerum
                                                            facilis
                                                            est et expedita distinctio. Nam libero tempore, cum soluta nobis
                                                            est
                                                            eligendi optio cumque nihil impedit quo minus id quod maxime
                                                            placeat
                                                            facere possimus, omnis voluptas assumenda est, omnis dolor
                                                            repellendus.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Tabs style1</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="panel panel-primary">
                                                <div class="tab-menu-heading">
                                                    <div class="tabs-menu ">
                                                        <!-- Tabs -->
                                                        <ul class="nav panel-tabs">
                                                            <li class=""><a href="#tab011" class="active"
                                                                    data-bs-toggle="tab">Tab 1</a></li>
                                                            <li><a href="#tab21" data-bs-toggle="tab">Tab 2</a></li>
                                                            <li><a href="#tab31" data-bs-toggle="tab">Tab 3</a></li>
                                                            <li><a href="#tab41" data-bs-toggle="tab">Tab 4</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body tabs-menu-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab011">
                                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus
                                                                qui
                                                                blanditiis praesentium voluptatum deleniti atque corrupti
                                                                quos
                                                                dolores et quas molestias excepturi sint occaecati
                                                                cupiditate
                                                                non provident, similique sunt in culpa qui officia deserunt
                                                                mollitia animi, id est laborum et dolorum fuga.</p>
                                                            <p> Et harum quidem rerum facilis est et expedita distinctio.
                                                                Nam
                                                                libero tempore, cum soluta nobis est eligendi optio cumque
                                                                nihil
                                                                impedit quo minus id quod maxime placeat facere possimus,
                                                                omnis
                                                                voluptas assumenda est, omnis dolor repellendus. </p>
                                                        </div>
                                                        <div class="tab-pane" id="tab21">
                                                            <p> Et harum quidem rerum facilis est et expedita distinctio.
                                                                Nam
                                                                libero tempore, cum soluta nobis est eligendi optio cumque
                                                                nihil
                                                                impedit quo minus id quod maxime placeat facere possimus,
                                                                omnis
                                                                voluptas assumenda est, omnis dolor repellendus. </p>
                                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus
                                                                qui
                                                                blanditiis praesentium voluptatum deleniti atque corrupti
                                                                quos
                                                                dolores et quas molestias excepturi sint occaecati
                                                                cupiditate
                                                                non provident, similique sunt in culpa qui officia deserunt
                                                                mollitia animi, id est laborum et dolorum fuga.</p>
                                                        </div>
                                                        <div class="tab-pane" id="tab31">
                                                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum
                                                                necessitatibus saepe eveniet ut et voluptates repudiandae
                                                                sint
                                                                et molestiae non recusandae</p>
                                                            <p> Et harum quidem rerum facilis est et expedita distinctio.
                                                                Nam
                                                                libero tempore, cum soluta nobis est eligendi optio cumque
                                                                nihil
                                                                impedit quo minus id quod maxime placeat facere possimus,
                                                                omnis
                                                                voluptas assumenda est, omnis dolor repellendus. </p>
                                                        </div>
                                                        <div class="tab-pane" id="tab41">
                                                            <p>On the other hand, we denounce with righteous indignation and
                                                                dislike men who are so beguiled and demoralized by the
                                                                charms of
                                                                pleasure of the moment, so blinded by desire</p>
                                                            <p>Nam libero tempore, cum soluta nobis est eligendi optio
                                                                cumque
                                                                nihil impedit quo minus id quod maxime placeat facere
                                                                possimus,
                                                                omnis voluptas assumenda est, omnis dolor repellendus.
                                                                Temporibus autem quibusdam et aut officiis debitis aut rerum
                                                                necessitatibus </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Tabs Style2</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="panel panel-primary">
                                                <div class=" tab-menu-heading">
                                                    <div class="tabs-menu1 ">
                                                        <!-- Tabs -->
                                                        <ul class="nav panel-tabs">
                                                            <li class=""><a href="#tab5" class="active"
                                                                    data-bs-toggle="tab">Tab
                                                                    1</a></li>
                                                            <li><a href="#tab6" data-bs-toggle="tab">Tab 2</a></li>
                                                            <li><a href="#tab7" data-bs-toggle="tab">Tab 3</a></li>
                                                            <li><a href="#tab8" data-bs-toggle="tab">Tab 4</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body tabs-menu-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active " id="tab5">
                                                            <p>Nam libero tempore, cum soluta nobis est eligendi optio
                                                                cumque
                                                                nihil impedit quo minus id quod maxime placeat facere
                                                                possimus,
                                                                omnis voluptas assumenda est, omnis dolor repellendus.
                                                                Temporibus autem quibusdam et aut officiis debitis aut rerum
                                                                necessitatibus </p>
                                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                                                diam
                                                                nonumy eirmod tempor invidunt ut labore et dolore magna
                                                                aliquyam
                                                                erat, sed diam voluptua. At vero eos et</p>
                                                        </div>
                                                        <div class="tab-pane " id="tab6">
                                                            <p> default model text, and a search for 'lorem ipsum' will
                                                                uncover
                                                                many web sites still in their infancy. Various versions have
                                                                evolved over the years, sometimes by accident, sometimes on
                                                                purpose (injected humour and the like</p>
                                                            <p>Nam libero tempore, cum soluta nobis est eligendi optio
                                                                cumque
                                                                nihil impedit quo minus id quod maxime placeat facere
                                                                possimus,
                                                                omnis voluptas assumenda est, omnis dolor repellendus.
                                                                Temporibus autem quibusdam et aut officiis debitis aut rerum
                                                                necessitatibus </p>
                                                        </div>
                                                        <div class="tab-pane " id="tab7">
                                                            <p>Nam libero tempore, cum soluta nobis est eligendi optio
                                                                cumque
                                                                nihil impedit quo minus id quod maxime placeat facere
                                                                possimus,
                                                                omnis voluptas assumenda est, omnis dolor repellendus.
                                                                Temporibus autem quibusdam et aut officiis debitis aut rerum
                                                                necessitatibus </p>
                                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                                                diam
                                                                nonumy eirmod tempor invidunt ut labore et dolore magna
                                                                aliquyam
                                                                erat, sed diam voluptua. At vero eos et</p>
                                                        </div>
                                                        <div class="tab-pane " id="tab8">
                                                            <p>Nam libero tempore, cum soluta nobis est eligendi optio
                                                                cumque
                                                                nihil impedit quo minus id quod maxime placeat facere
                                                                possimus,
                                                                omnis voluptas assumenda est, omnis dolor repellendus.
                                                                Temporibus autem quibusdam et aut officiis debitis aut rerum
                                                                necessitatibus </p>
                                                            <p>default model text, and a search for 'lorem ipsum' will
                                                                uncover
                                                                many web sites still in their infancy. Various versions have
                                                                evolved over the years, sometimes by accident, sometimes on
                                                                purpose (injected humour and the like</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Tabs Style3</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="panel tabs-style6">
                                                    <div class="panel-head">
                                                        <ul class="nav nav-tabs">
                                                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#style6tab1">Home</a></li>
                                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#style6tab2">About</a></li>
                                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#style6tab3">Contact</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="style6tab1">
                                                                Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                                                            </div>
                                                            <div class="tab-pane" id="style6tab2">
                                                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
                                                            </div>
                                                            <div class="tab-pane" id="style6tab3">
                                                                Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Tabs width icon</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="panel panel-primary">
                                                <div class="tab-menu-heading">
                                                    <div class="tabs-menu">
                                                        <!-- Tabs -->
                                                        <ul class="nav panel-tabs panel-secondary">
                                                            <li><a href="#tab9" class="active" data-bs-toggle="tab"><span><i class="fe fe-user me-1"></i></span>Tab 1</a></li>
                                                            <li><a href="#tab10" data-bs-toggle="tab"><span><i class="fe fe-calendar me-1"></i></span>Tab 2</a></li>
                                                            <li><a href="#tab11" data-bs-toggle="tab"><span><i class="fe fe-settings me-1"></i></span>Tab 3</a></li>
                                                            <li><a href="#tab12" data-bs-toggle="tab"><span><i class="fe fe-bell me-1"></i></span>Tab 4</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body tabs-menu-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab9">
                                                            <p>page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes
                                                                by accident, sometimes on purpose (injected humour and the like</p>
                                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et</p>
                                                        </div>
                                                        <div class="tab-pane" id="tab10">
                                                            <p> default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected
                                                                humour and the like</p>
                                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et</p>
                                                        </div>
                                                        <div class="tab-pane" id="tab11">
                                                            <p>over the years, sometimes by accident, sometimes on purpose (injected humour and the like</p>
                                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et</p>
                                                        </div>
                                                        <div class="tab-pane" id="tab12">
                                                            <p>page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes
                                                                by accident, sometimes on purpose (injected humour and the like</p>
                                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Tabs on right side</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab_wrapper second_tab">
                                                <ul class="tab_list">
                                                    <li class="">Tab 1</li>
                                                    <li>Tab 2</li>
                                                    <li>Tab 3</li>
                                                    <li>Tab 4</li>
                                                    <li>Tab 5</li>
                                                    <li>Tab 6</li>
                                                </ul>

                                                <div class="content_wrapper">
                                                    <div class="tab_content active">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text
                                                            ever since the 1500s, when an unknown printer took a galley of
                                                            type
                                                            and scrambled it to make a type specimen book. It has survived
                                                            not
                                                            only five centuries, but also
                                                            the leap into electronic typesetting, remaining essentially
                                                            unchanged. It was popularised in the 1960s with the release of
                                                            Letraset sheets containing
                                                            Lorem Ipsum passages, and more recently with desktop publishing
                                                            software like Aldus PageMaker including versions of Lorem
                                                            Ipsum.Lorem
                                                            Ipsum is simply dummy text of the printing and typesetting
                                                            industry.
                                                            Lorem Ipsum has been the industry's standard dummy text ever
                                                            since
                                                            the 1500s, when an unknown printer took
                                                            a galley of type and scrambled it to make a type specimen book.
                                                            It
                                                            has survived not only five centuries, but also the leap into
                                                            electronic typesetting, remaining essentially unchanged. It was
                                                            popularised in the 1960s with the release
                                                            of Letraset sheets containing Lorem Ipsum passages,
                                                            and more recently with desktop publishing software like Aldus
                                                            PageMaker including versions of Lorem Ipsum.</p>
                                                    </div>
                                                    <div class="tab_content">
                                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                            text. It
                                                            has roots in a piece of classical Latin literature from 45 BC,
                                                            making it over 2000 years old. Richard McClintock, a Latin
                                                            professor
                                                            at Hampden-Sydney College in
                                                            Virginia, looked up one of the more obscure Latin words,
                                                            consectetur, from a Lorem Ipsum passage, and going through the
                                                            cites
                                                            of the word in classical literature, discovered the undoubtable
                                                            source. Lorem Ipsum comes from sections
                                                            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                                                            Extremes
                                                            of Good and Evil) by Cicero, written in 45 BC. This book is a
                                                            treatise on the theory of ethics, very popular during the
                                                            Renaissance. The first line of Lorem Ipsum,
                                                            "Lorem ipsum dolor sit amet..", comes from a line in section
                                                            1.10.32. Contrary to popular belief, Lorem Ipsum is not simply
                                                            random text. It has roots in a piece of classical Latin
                                                            literature
                                                            from 45 BC, making it over 2000 years
                                                            old. Richard McClintock, a Latin professor at Hampden-Sydney
                                                            College
                                                            in Virginia, looked up one of the more obscure Latin words,
                                                            consectetur, from a Lorem Ipsum passage, and going through the
                                                            cites
                                                            of the word in classical literature,
                                                            discovered the undoubtable source. Lorem Ipsum comes from
                                                            sections
                                                            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                                                            Extremes
                                                            of Good and Evil) by Cicero, written in 45 BC. This book is a
                                                            treatise on the theory of ethics,
                                                            very popular during the Renaissance. The first line of Lorem
                                                            Ipsum,
                                                            "Lorem ipsum dolor sit amet..", comes from a line in section
                                                            1.10.32.</p>
                                                    </div>
                                                    <div class="tab_content">
                                                        <p>It is a long established fact that a reader will be distracted by
                                                            the
                                                            readable content of a page when looking at its layout. The point
                                                            of
                                                            using Lorem Ipsum is that it has a more-or-less normal
                                                            distribution
                                                            of letters, as opposed to
                                                            using 'Content here, content here', making it look like readable
                                                            English. Many desktop publishing packages and web page editors
                                                            now
                                                            use Lorem Ipsum as their default model text, and a search for
                                                            'lorem
                                                            ipsum' will uncover many web
                                                            sites still in their infancy. Various versions have evolved over
                                                            the
                                                            years, sometimes by accident, sometimes on purpose (injected
                                                            humour
                                                            and the like) It is a long established fact that a reader will
                                                            be
                                                            distracted by the readable
                                                            content of a page when looking at its layout. The point of using
                                                            Lorem Ipsum is that it has a more-or-less normal distribution of
                                                            letters, as opposed to using 'Content here, content here',
                                                            making it
                                                            look like readable English.
                                                            Many desktop publishing packages and web page editors now use
                                                            Lorem
                                                            Ipsum as their default model text, and a search for 'lorem
                                                            ipsum'
                                                            will uncover many web sites still in their infancy. Various
                                                            versions
                                                            have evolved over the years,
                                                            sometimes by accident, sometimes on purpose (injected humour and
                                                            the
                                                            like).</p>
                                                    </div>
                                                    <div class="tab_content">
                                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                            text. It
                                                            has roots in a piece of classical Latin literature from 45 BC,
                                                            making it over 2000 years old. Richard McClintock, a Latin
                                                            professor
                                                            at Hampden-Sydney College in
                                                            Virginia, looked up one of the more obscure Latin words,
                                                            consectetur, from a Lorem Ipsum passage, and going through the
                                                            cites
                                                            of the word in classical literature, discovered the undoubtable
                                                            source. Lorem Ipsum comes from sections
                                                            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                                                            Extremes
                                                            of Good and Evil) by Cicero, written in 45 BC. This book is a
                                                            treatise on the theory of ethics, very popular during the
                                                            Renaissance. The first line of Lorem Ipsum,
                                                            "Lorem ipsum dolor sit amet..", comes from a line in section
                                                            1.10.32. Contrary to popular belief, Lorem Ipsum is not simply
                                                            random text. It has roots in a piece of classical Latin
                                                            literature
                                                            from 45 BC, making it over 2000 years
                                                            old. Richard McClintock, a Latin professor at Hampden-Sydney
                                                            College
                                                            in Virginia, looked up one of the more obscure Latin words,
                                                            consectetur, from a Lorem Ipsum passage, and going through the
                                                            cites
                                                            of the word in classical literature,
                                                            discovered the undoubtable source. Lorem Ipsum comes from
                                                            sections
                                                            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                                                            Extremes
                                                            of Good and Evil) by Cicero, written in 45 BC. This book is a
                                                            treatise on the theory of ethics,
                                                            very popular during the Renaissance. The first line of Lorem
                                                            Ipsum,
                                                            "Lorem ipsum dolor sit amet..", comes from a line in section
                                                            1.10.32.</p>
                                                    </div>
                                                    <div class="tab_content">
                                                        <p>There are many variations of passages of Lorem Ipsum available,
                                                            but
                                                            the majority have suffered alteration in some form, by injected
                                                            humour, or randomised words which don't look even slightly
                                                            believable. If you are going to use a passage
                                                            of Lorem Ipsum, you need to be sure there isn't anything
                                                            embarrassing hidden in the middle of text. All the Lorem Ipsum
                                                            generators on the Internet tend to repeat predefined chunks as
                                                            necessary, making this the first true generator
                                                            on the Internet. It uses a dictionary of over 200 Latin words,
                                                            combined with a handful of model sentence structures, to
                                                            generate
                                                            Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is
                                                            therefore always free from repetition,
                                                            injected humour, or non-characteristic words etc. There are many
                                                            variations of passages of Lorem Ipsum available, but the
                                                            majority
                                                            have suffered alteration in some form, by injected humour, or
                                                            randomised words which don't look
                                                            even slightly believable. If you are going to use a passage of
                                                            Lorem
                                                            Ipsum, you need to be sure there isn't anything embarrassing
                                                            hidden
                                                            in the middle of text. All the Lorem Ipsum generators on the
                                                            Internet tend to repeat predefined
                                                            chunks as necessary, making this the first true generator on the
                                                            Internet. It uses a dictionary of over 200 Latin words, combined
                                                            with a handful of model sentence structures, to generate Lorem
                                                            Ipsum
                                                            which looks reasonable. The
                                                            generated Lorem Ipsum is therefore always free from repetition,
                                                            injected humour, or non-characteristic words etc.</p>
                                                    </div>
                                                    <div class="tab_content">
                                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                            text. It
                                                            has roots in a piece of classical Latin literature from 45 BC,
                                                            making it over 2000 years old. Richard McClintock, a Latin
                                                            professor
                                                            at Hampden-Sydney College in
                                                            Virginia, looked up one of the more obscure Latin words,
                                                            consectetur, from a Lorem Ipsum passage, and going through the
                                                            cites
                                                            of the word in classical literature, discovered the undoubtable
                                                            source. Lorem Ipsum comes from sections
                                                            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                                                            Extremes
                                                            of Good and Evil) by Cicero, written in 45 BC. This book is a
                                                            treatise on the theory of ethics, very popular during the
                                                            Renaissance. The first line of Lorem Ipsum,
                                                            "Lorem ipsum dolor sit amet..", comes from a line in section
                                                            1.10.32. Contrary to popular belief, Lorem Ipsum is not simply
                                                            random text. It has roots in a piece of classical Latin
                                                            literature
                                                            from 45 BC, making it over 2000 years
                                                            old. Richard McClintock, a Latin professor at Hampden-Sydney
                                                            College
                                                            in Virginia, looked up one of the more obscure Latin words,
                                                            consectetur, from a Lorem Ipsum passage, and going through the
                                                            cites
                                                            of the word in classical literature,
                                                            discovered the undoubtable source. Lorem Ipsum comes from
                                                            sections
                                                            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                                                            Extremes
                                                            of Good and Evil) by Cicero, written in 45 BC. This book is a
                                                            treatise on the theory of ethics,
                                                            very popular during the Renaissance. The first line of Lorem
                                                            Ipsum,
                                                            "Lorem ipsum dolor sit amet..", comes from a line in section
                                                            1.10.32.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!--- TABS JS -->
        <script src="{{asset('build/assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
        <script src="{{asset('build/assets/plugins/tabs/tabs.js')}}"></script>


@endsection