
{{-- @props(['job']) --}}

<div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <a href="{{ route('show',$job->id) }}">
                        <img class="hidden w-48 mr-6 md:block" src="{{ $job->logo ?
                        asset('storage/' . $job->logo) : asset('/images/no-image.png ') }}"alt=""/>
                        </a>
                        <div>
                            <h3 class="text-2xl">
                                <a href="{{route('show', $job->id)  }}">{{ $job->job_title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ $job->company }}</div>
                                <x-tags-card :tagsCsv="$job->tags"/>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot">{{ $job->location }}</i>                                 MA
                            </div>
                            <h3 class="text-2x1">{{ $job['description'] }}</h3>
                        </div>
                    </div>
                </div>
