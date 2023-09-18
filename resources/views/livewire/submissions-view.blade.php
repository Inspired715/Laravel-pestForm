<div
    x-data="{ active: 0 }" class="lg:shadow flex items-start h-[456px]"
    wire:loading.class='grayscale pointer-events-none cursor-not-allowed'
>
    <!-- search block -->
    <div
        x-bind:class="active !== 0 ? 'hidden lg:block' : 'block'"
        class="bg-white/40 w-full lg:w-64 h-full overflow-y-auto">
        <!-- search input -->
        <div class="p-2">
            <div class="w-full relative text-xs bg-white shadow-sm p-2 pl-8">
                <svg class="w-4 h-4 absolute left-2 top-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                    </path>
                </svg>
                <input
                    type="text"
                    class="bg-transparent w-full outline-none"
                    wire:model="search"
                    placeholder="Search inbox submissions... (Press &quot;/&quot;)"
                >
            </div>
        </div>
        <!-- users -->
        @foreach ($submissions as $key => $s)
            <div class="flex flex-col w-full {{ $key == 0 ? 'activeFirst' : '' }}">
                <div @class([
                    'p-4 cursor-pointer hover:bg-brand-gray/80 text-xs border-y border-brand-gray',
                    '!border !border-brand-primary-300 !bg-brand-primary-300/20' => $selectedSubmissionId == $s->id,
                ])
                     wire:click="selectSubmission({{ $s->id }})"
                >
                    <!-- user head -->
                    <div class="flex items-center justify-between text-brand-primary-300 mb-2">
                        <h3 class="font-bold">
                            {{ $this->getSubmittionName($s->data) }}
                        </h3>
                        <p>
                            {{ $s->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <p class="font-semibold text-brand-primary-400">
                        {{$this->truncateString(last($s->data)['value'] ?? "",90)}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- info block -->
    <div class=" lg:bg-white lg:block pb-3 flex-1 h-full overflow-y-auto">
        @if ($selectedSubmission)
            <button
                wire:click='selectSubmission(null)'
                class="text-sm lg:hidden flex items-center gap-0.5 mb-2 p-2 bg-transparent">
                <svg class="block w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z">
                    </path>
                </svg>
                <span>
                    Back
                </span>
            </button>
            <div class="w-full  bg-white shadow lg:shadow-none p-4">
                <!-- btns -->
                <div class="flex flex-col sm:flex-row items-center justify-end gap-1">
                    <button
                        wire:click="setArchived({{ (int) !$selectedSubmission->archived }})"
                        class="relative flex items-start justify-center gap-0.5 text-xs bg-transparent hover:bg-gray-200 text-gray-400 border border-gray-400 rounded px-3 py-1 w-full sm:w-auto"
                    >
                        <svg class="w-3 h-3 mt-0.5 block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M3 10H2V4.00293C2 3.44903 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.43788 22 4.00293V10H21V20.0015C21 20.553 20.5551 21 20.0066 21H3.9934C3.44476 21 3 20.5525 3 20.0015V10ZM19 10H5V19H19V10ZM4 5V8H20V5H4ZM9 12H15V14H9V12Z">
                            </path>
                        </svg>
                        <span class="uppercase block">
                            {{ $selectedSubmission->archived ? 'Unarchive' : 'Archive' }}
                        </span>
                    </button>
                    <button
                        wire:click="setSpam({{ (int) !$selectedSubmission->spam }})"
                        class="relative flex items-start justify-center gap-0.5 text-xs bg-transparent hover:bg-gray-200 text-gray-400 border border-gray-400 rounded px-3 py-1 w-full sm:w-auto"
                    >
                        <svg class="w-3 h-3 mt-0.5 block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M15.935 2.50098L21.5 8.06595V15.936L15.935 21.501H8.06497L2.5 15.936V8.06595L8.06497 2.50098H15.935ZM15.1066 4.50098H8.8934L4.5 8.89437V15.1076L8.8934 19.501H15.1066L19.5 15.1076V8.89437L15.1066 4.50098ZM10.9993 15.0002H12.9993V17.0002H10.9993V15.0002ZM10.9993 7.00024H12.9993V13.0002H10.9993V7.00024Z">
                            </path>
                        </svg>
                        <span class="uppercase block">
                            {{ $selectedSubmission->spam ? 'Un-spam' : 'Spam' }}
                        </span>
                    </button>
                    @if (!$selectedSubmission->email())
                        <button disabled title="This submission does not have an email address."
                            class="relative flex items-start justify-center gap-0.5 text-xs bg-gray-300 text-black border border-transparent rounded px-3 py-1 w-full sm:w-auto grayscale cursor-not-allowed">
                            <svg class="w-3 h-3 mt-0.5 block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M11 20L1 12L11 4V9C16.5228 9 21 13.4772 21 19C21 19.2729 20.9891 19.5433 20.9676 19.8107C19.4605 16.9502 16.458 15 13 15H11V20Z">
                                </path>
                            </svg>
                            <span class="uppercase block">
                                Reply
                            </span>
                        </button>
                    @else
                        <a target="_blank" title="Reply to this submission via email."
                            href="mailto:{{ $selectedSubmission->email() }}?subject=Re: {{ $selectedSubmission->name }}">
                            <button
                                class="relative flex items-start justify-center gap-0.5 text-xs bg-gray-300 hover:bg-gray-200 text-black border border-transparent rounded px-3 py-1 w-full sm:w-auto"
                            >
                                <svg
                                    class="w-3 h-3 mt-0.5 block"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M11 20L1 12L11 4V9C16.5228 9 21 13.4772 21 19C21 19.2729 20.9891 19.5433 20.9676 19.8107C19.4605 16.9502 16.458 15 13 15H11V20Z"
                                    ></path>
                                </svg>
                                <span class="uppercase block">
                                    Reply
                                </span>
                            </button>
                        </a>
                    @endif
                </div>
                <!-- title -->
                <div class="my-2 pb-6 px-4 border-b border-gray-400 mb-8  ">
                    <div class="text-xs flex items-center gap-1 text-gray-400">
                        <span> {{ $selectedSubmission->created_at->format('d M Y H:i') }}
                        </span>
                        <div
                            class="relative"
                            x-data="{ open: false }"
                            x-on:click.away="open = false"
                            x-on:close.stop="open = false"
                        >
                            <div
                                x-on:click="open = ! open"
                            >
                                <button title="Show Metadata" class="flex items-center justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        ></path>
                                    </svg>
                                </button>
                            </div>

                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top" style="display: none;">
                                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                    <dl class="p-4 text-sm">
                                        <dt class="font-semibold">Client IP</dt>
                                        <dd class="whitespace-normal">{{$selectedSubmission->ip}}</dd>
                                        <dt class="mt-2 font-semibold">User Agent</dt>
                                        <dd class="whitespace-normal">{{$selectedSubmission->user_agent}}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-brand-primary-400 font-bold text-sm">
                        {{ $this->getSubmittionName($selectedSubmission->data) }}
                    </h2>
                </div>

                <div>
                    <div>
                        <label class="classic-label"></label>
                    </div>
                    @if($selectedSubmission->attachments)
                    <details class="mb-4 group">
                        <summary role="button" class="list-item text-base font-semibold text-black flex items-center space-x-2">
                            <span>Attachments ({{count($selectedSubmission->attachments)}})</span>
                        </summary>

                        <div class="transition-[opacity] transform ease-out opacity-0 group-open:opacity-100">
                            <div class="divide-y divide-gray-darker mt-2 border border-gray-darker rounded">
                                <div class="flex items-center space-x-2 p-2">
                                    @foreach ($selectedSubmission->attachments as $file)

                                    <div>
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                        </svg>
                                    </div>
                                    <div><a target="_blank" href="{{$file['base_url'].'/'.$file['file_path']}}" class="underline underline-offset-2 text-sm">{{$file['file_name']}}</a>
                                    </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </details>
                    @endif
                    <div class="flex items-center justify-center my-2">
                        <div class="w-1/6 border-b border-gray-darkest"></div>
                    </div>
                </div>

                {{-- Print form data --}}
                @foreach ($selectedSubmission->data as $d)
                    <div>
                        <label class="classic-label font-semibold text-sm text-brand-primary-400">
                            {{ $d['name'] }}
                        </label>
                        <p class="break-words mb-8 whitespace-pre-line text-brand-primary-300 text-xs">
                            @if(in_array($d['name'], config('constants.reply_to_form_field')))
                                <a
                                    target="_blank"
                                    title="Reply to this submission via email."
                                    class="font-medium hover:underline"
                                    href="mailto:{{ $d['value'] }}?subject=Re: {{ $selectedSubmission->name }}"
                                >
                                    {{ $d['value'] }}
                                </a>
                            @else
                                {{ $d['value'] }}
                            @endif
                        </p>
                    </div>
                @endforeach

            </div>
        @endif
    </div>
</div>
