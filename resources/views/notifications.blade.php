<div>
    @if ($this->showIcon)
        <a data-bs-toggle="offcanvas" href="#noticationUserManager" role="button" aria-controls="noticationUserManager"
            title="@lang('Show notifications')">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                </path>
                <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
            </svg>
            <span class="badge bg-red"></span>
        </a>
    @else
        <div wire:ignore class="offcanvas offcanvas-end" tabindex="-1" id="noticationUserManager"
            aria-labelledby="offcanvasEndLabel" aria-modal="true" role="dialog">
            <div class="offcanvas-header bg-blue text--bold text-bg-blue p-2">
                <h2 class="offcanvas-title" id="offcanvasEndLabel">@lang('Notication')</h2>
                <button type="button" class="btn-close text-reset bg-white p-2 me-1" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-header p-2">
                <div class="row w-100">
                    <div class="col-auto">
                        <select class="form-select">
                            <option value="all">All</option>
                            <option value="onlyme">Only Me</option>
                            <option value="read">Read</option>
                        </select>
                    </div>
                    <div class="col-auto ms-auto">
                        <a href="#" class=" btn btn-secondary">
                            Read All
                          </a>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body p-2">
                <div class="divide-y">
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar">JL</span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a witch."</strong>
                                    post.
                                </div>
                                <div class="text-secondary">yesterday</div>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    It's <strong>Mallory Hulme</strong>'s birthday. Wish him well!
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Dunn Slane</strong> posted <strong>"Well, what do you want?"</strong>.
                                </div>
                                <div class="text-secondary">today</div>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Emmy Levet</strong> created a new project <strong>Morning alarm
                                        clock</strong>.
                                </div>
                                <div class="text-secondary">4 days ago</div>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Maryjo Lebarree</strong> liked your photo.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar">EP</span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Egan Poetz</strong> registered new client as <strong>Trilia</strong>.
                                </div>
                                <div class="text-secondary">yesterday</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/002f.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Kellie Skingley</strong> closed a new deal on project <strong>Pen Pineapple
                                        Apple Pen</strong>.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/003f.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Christabel Charlwood</strong> created a new project for
                                    <strong>Wikibox</strong>.
                                </div>
                                <div class="text-secondary">4 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar">HS</span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Haskel Shelper</strong> change status of <strong>Tabler Icons</strong> from
                                    <strong>open</strong> to <strong>closed</strong>.
                                </div>
                                <div class="text-secondary">today</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/006m.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Lorry Mion</strong> liked <strong>Tabler UI Kit</strong>.
                                </div>
                                <div class="text-secondary">yesterday</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/004f.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Leesa Beaty</strong> posted new video.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/007m.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Perren Keemar</strong> and 3 others followed you.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar">SA</span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Sunny Airey</strong> upload 3 new photos to category
                                    <strong>Inspirations</strong>.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/009m.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Geoffry Flaunders</strong> made a <strong>$10</strong> donation.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/010m.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Thatcher Keel</strong> created a profile.
                                </div>
                                <div class="text-secondary">3 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/005f.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Dyann Escala</strong> hosted the event <strong>Tabler UI Birthday</strong>.
                                </div>
                                <div class="text-secondary">4 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/006f.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Avivah Mugleston</strong> mentioned you on <strong>Best of 2020</strong>.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar">AA</span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Arlie Armstead</strong> sent a Review Request to <strong>Amanda
                                        Blake</strong>.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif
</div>
