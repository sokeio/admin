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
            aria-labelledby="offcanvasEndLabel" aria-modal="true" role="dialog" x-data="{
                pageHtml: [],
                getPageHtml() {
                    return this.pageHtml.join('');
                },
                flgLoadMore: false,
                async loadMore() {
                    this.flgLoadMore = true;
                    let html = await $wire.loadMore();
                    if (html) {
                        this.pageHtml.push(html);
                    }
                    this.flgLoadMore = false;
                },
                initNotification() {
                    const divElement = $refs.notificationBody;
                    let self = this;
                    divElement.addEventListener('scroll', function() {
                        const scrollPosition = divElement.scrollTop + divElement.clientHeight+300;
                        const totalHeight = divElement.scrollHeight;
            
                        if (scrollPosition >= totalHeight) {
                            self.loadMore();
                        }
                    });
                    this.loadMore();
                }
            }"
            x-init="initNotification">
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
                        <a href="#" wire:click='testData()' class=" btn btn-secondary">
                            Read All
                        </a>
                    </div>
                </div>
                <div x-show="loadMore" x-text="loadMore ? 'Loading...' : ''" x-cloak></div>
            </div>
            <div class="offcanvas-body p-2" x-ref="notificationBody">
                <div class="divide-y" x-html="getPageHtml()">
                </div>
            </div>
        </div>
    @endif
</div>
