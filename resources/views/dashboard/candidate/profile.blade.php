@extends('layouts.app')
@section('title', 'Profile')

@section('content')

    @include('includes.update-profile')


    <div class="hs-accordion-group sm:mb-4">
        @include('includes.education')

        @include('includes.experience')

    </div>
    <script>
        $(document).ready(function() {
            $('.edit-education-btn').click(
                async function() {

                    let id = $(this).data('id');
                    let res = await axios.get(`/api/education/${id}`);
                    $('#edit_degree').val(res.data.degree);
                    $('#edit_institution').val(res.data.institution);
                    $('#edit_department').val(res.data.department);
                    $('#edit_year').val(res.data.year);
                    $('#edit_result').val(res.data.result);
                    $('#edit_education_form').attr('action', `/candidates/education/edit/${id}`);
                    $('#edit_education').show();
                }
            )
            // Show modal when button is clicked
            $('#openModalBtn').click(function() {
                $('#hs-basic-modal').removeClass('hidden');
            });

            // Close modal when close button or backdrop is clicked
            $('#hs-basic-modal .bg-gray-500, #hs-basic-modal button').click(function() {
                $('#hs-basic-modal').addClass('hidden');
            });
        });
    </script>

@endsection
