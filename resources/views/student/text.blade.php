<!-- @extends('layout.stu_public') -->

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Custom vertical tab</h4>
        <p class="card-description">
            Add class <code>.nav-tabs-vertical-custom</code> to
            <code>.nav</code> and <code>.tab-content-vertical-custom</code> to
            <code>.tab-content</code>
        </p>
        <div class="row">
            <div class="col-3">
                <ul
                    class=".nav-tabs-vertical-custom nav-tabs nav-tabs-vertical-custom"
                    role="tablist"
                >
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="home-tab"
                            data-bs-toggle="tab"
                            href="#home-3"
                            role="tab"
                            aria-controls="home"
                            aria-selected="false"
                            tabindex="-1"
                        >
                            Playing Video Games With Imagination
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link active"
                            id="profile-tab"
                            data-bs-toggle="tab"
                            href="#profile-3"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="true"
                        >
                            Getting Free Publicity For Your Business
                        </a>
                    </li>
                    @foreach($contents as $content)
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="tab-{{$content->id}}"
                            data-bs-toggle="tab"
                            href="#content-{{$content->id}}"
                            role="tab"
                            aria-controls="content-{{$content->id}}"
                            aria-selected="false"
                            tabindex="-1"
                        >
                            {{$content->content_name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-9 col-lg-6">
                <div
                    class=".tab-content-vertical-custom tab-content-vertical tab-content-vertical-custom"
                >
                    <div
                        class="tab-pane fade"
                        id="home-3"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                    >
                        <h6 class="font-weight-normal">
                            Profiles Of The Powerful Advertising Exec Steve
                            Grasse
                        </h6>
                        <h3 class="font-weight-normal">
                            How To Write Better Advertising Copy
                        </h3>
                        <div class="d-flex mt-4">
                            <img
                                src="../../../assets/images/samples/300x300/3.jpg"
                                class="w-25 h-100 rounded"
                            />
                            <img
                                src="../../../assets/images/samples/300x300/4.jpg"
                                class="w-25 h-100 ms-2 rounded"
                            />
                        </div>
                        <p class="mt-4">
                            The key to victory is discipline, and that means a
                            well made bed. You will practice until you can make
                            your bed in your sleep. You don't know how to do any
                            of those. Then throw her in the laundry room, which
                            will hereafter be referred to as "the brig".
                        </p>
                    </div>
                    <div
                        class="tab-pane fade active show"
                        id="profile-3"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        <div class="media">
                            <img
                                class="align-self-center me-3 w-25 rounded"
                                src="../../../assets/images/samples/300x300/15.jpg"
                                alt="sample image"
                            />
                            <div class="media-body">
                                <p>
                                    And until then, I can never die? I'm a
                                    thing. Fry, you can't just sit here in the
                                    dark listening to classical music. Is
                                    today's hectic lifestyle making you tense
                                    and impatient? Is today's hectic lifestyle
                                    making you tense and impatient?
                                </p>
                                <p>
                                    Robot 1-X, save my friends! And Zoidberg!
                                    Aww, it's true. I've been hiding it for so
                                    long. Fry, we have a crate to deliver. Yes!
                                    In your face, Gandhi! Interesting. No, wait,
                                    the other thing: tedious.
                                </p>
                                <p>
                                    Five hours? Aw, man! Couldn't you just get
                                    me the death penalty? Yes! In your face,
                                    Gandhi! We're rescuing ya. Yeah, I do that
                                    with my stupidness. With gusto.
                                </p>
                            </div>
                        </div>
                    </div>

                    @foreach($contents as $content)
                    <div
                        class="tab-pane fade"
                        id="content-{{$content->id}}"
                        role="tabpanel"
                        aria-labelledby="tab-{{$content->id}}"
                    >
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">
                                    {{$content->content_name}}
                                </h5>
                                <p>{{$content->content_details}}</p>
                            </div>
                            <img
                                class="ms-3 w-25"
                                src="../../../assets/images/samples/300x300/5.jpg"
                                alt="sample image"
                            />
                        </div>
                    </div>
                    @endforeach

                    <div
                        class="tab-pane fade"
                        id="contact-3"
                        role="tabpanel"
                        aria-labelledby="contact-tab"
                    >
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">
                                    You've swallowed a planet!
                                </h5>
                                <p>
                                    Did I mention we have comfy chairs? You hate
                                    me; you want to kill me! Well, go on! Kill
                                    me! KILL ME! I'm the Doctor, I'm worse than
                                    everyone's aunt. *catches himself* And that
                                    is not how I'm introducing myself.
                                </p>
                            </div>
                            <img
                                class="ms-3 w-25"
                                src="../../../assets/images/samples/300x300/5.jpg"
                                alt="sample image"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

