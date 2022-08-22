@extends('layouts.main')
@section('content')
  <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <header>
                        <h1
                            class="text-3xl text-center font-bold my-6 uppercase"
                        >
                            Manage Gigs
                        </h1>
                    </header>

                    <table class="w-full table-auto rounded-sm">
                        <tbody>
                            @foreach ($all_jobs as $job)
                                
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="{{ route('show',$job->id) }}">
                                        {{ mb_strimwidth($job->job_title,0,20,'...')  }}
                                    </a>
                                </td>
                                <td  class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="{{ route('edit',$job->id) }}" class="text-blue-400 px-6 py-2 rounded-xl" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form action="{{ route('destroy',$job->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-600">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection