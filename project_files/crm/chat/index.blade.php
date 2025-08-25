@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<script>
    const verificationToken = "{{$currentUser->createAuthVerificationToken()}}";
</script>

<iframe style="height: 100vh; width: 100vw;" src="https://95.217.164.153:8080/"></iframe>

@include('add.footer')