@extends('layouts.app')
@section('content')

    {{-- Content Section --> --}}

    <div class="site-section">
        <div class="container">
            <form method="POST" action="">
                <div class="row d-flex"> <!-- Use d-flex for a flexible layout -->
                    <div class="col-md-6 d-flex flex-column mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border flex-fill"> <!-- Added flex-fill to make it stretch -->
                            <div class="form-group">
                                <label for="c_fname" class="text-black">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="fullname" value="User Name"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_address" name="address"
                                    placeholder="Street address" required>
                            </div>

                            <div class="form-group">
                                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_phone" name="phone"
                                    placeholder="Phone Number" required>
                            </div>

                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="Write your notes here..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column"> <!-- Added flex-column to ensure equal height -->
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border flex-fill"> <!-- Added flex-fill to make it stretch -->
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Product Name <strong class="mx-2">x</strong> 1</td>
                                        <td>$100.00</td>
                                    </tr>
                                    <tr>
                                        <td>Product Name <strong class="mx-2">x</strong> 2</td>
                                        <td>$200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                        <td class="text-black font-weight-bold"><strong>$300.00</strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Payment Options -->
                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0 text-black">
                                    <a class="d-block text-black" data-toggle="collapse" href="#collapsebank" role="button"
                                        aria-expanded="false" aria-controls="collapsebank" class="text-black">Direct Bank
                                        Transfer</a>
                                </h3>
                                <div class="collapse" id="collapsebank">
                                    <div class="py-2">
                                        <p class="mb-0 text-black">Make your payment directly into our bank account. Please
                                            use your Order ID as the payment reference. Your order won’t be shipped until
                                            the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0">
                                    <a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button"
                                        aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a>
                                </h3>
                                <div class="collapse" id="collapsecheque">
                                    <div class="py-2">
                                        <p class="mb-0">Make your payment directly into our bank account. Please use your
                                            Order ID as the payment reference. Your order won’t be shipped until the funds
                                            have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 mb-5">
                                <h3 class="h6 mb-0">
                                    <a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                                        aria-expanded="false" aria-controls="collapsepaypal">Paypal</a>
                                </h3>
                                <div class="collapse" id="collapsepaypal">
                                    <div class="py-2">
                                        <p class="mb-0">Make your payment directly into our bank account. Please use your
                                            Order ID as the payment reference. Your order won’t be shipped until the funds
                                            have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Centered Button Section -->
                <div class="row">
                    <div class="col-md-12 mb-2 d-flex justify-content-center">
                        <div class="d-grid gap-2 col-8">
                            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-lg py-3 my-3"
                                style="width: 100%;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- End of Content Section --> --}}
    
@endsection
