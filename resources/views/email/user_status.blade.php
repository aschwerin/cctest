<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Hi {{ $name }},</h3>
            <p>A User Administrator has reviewed your account information and updated your status.</p>
            <p>
                <ul>
                    <li>
                        Roles:
                        <ul>
                            @foreach($roles as $role)
                                <li>{{ $role->display_name }}</li>
                            @endforeach
                        </ul>
                    </li>
                    <li>Active: {{ ($active)?"Yes":"No" }}</li>
                </ul>
            </p>
        </div>
    </div>
</div>