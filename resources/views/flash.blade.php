@if (session()->has('flash_message'))
    <div class="notify notify--{{ session()->get('flash_message_type') }}">
        {{ session()->get('flash_message') }}
    </div>
@endif