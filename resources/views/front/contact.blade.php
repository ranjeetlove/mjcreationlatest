@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')

<section>
<div class="container my-5">
<div class="row">
   <div class="col-lg-6">
    <div class="my-5"><span><i class="fa fa-phone contact-icon"></i>Phone:+91 0987654321</span></div>
    <div class="my-5"><span><i class="fa fa-envelope contact-icon"></i>Email:xyz@gmail.com</span></div>
    <div class="my-5"><span><i class="fa fa-home contact-icon"></i>Address:G-39, Sector 63 Rd, A Block, Sector 63, Noida, Uttar Pradesh 201301</span></div>
   </div>
   <div class="col-lg-6">
   <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-contact-submit">Submit</button>
                            </div>
                        </form>
                    </div>
   </div>
</div>
</div>
</section>

<section>
    <div class="container-fluid">
        <div class="row my-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.10015715721!2d77.30952127409272!3d28.59677198570624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce59c7d5fb4df%3A0xcb7e5d3235f1ec36!2sPost%20Office%2C%20New%20Ashok%20Nagar!5e0!3m2!1sen!2sin!4v1722851004498!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

@endsection