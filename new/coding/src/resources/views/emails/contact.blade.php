<!-- resources/views/emails/contact.blade.php -->
<h2>Pesan Baru dari Form Kontak Website</h2>

<p><strong>Nama:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Subjek:</strong> {{ $data['subject'] }}</p>
<p><strong>Pesan:</strong></p>
<p>{{ $data['message'] }}</p>
