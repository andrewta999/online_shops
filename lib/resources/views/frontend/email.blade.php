
<link rel="stylesheet" href="css/email.css">


					<div id="wrap-inner">
						<div id="khach-hang">
							<h3>Customer's Info</h3>
							<p>
								<span class="info">Name: </span>
								{{$info['name']}}
							</p>
							<p>
								<span class="info">Email: </span>
								{{$info['email']}}
							</p>
							<p>
								<span class="info">Phone number: </span>
								{{$info['phone']}}
							</p>
							<p>
								<span class="info">Address: </span>
								{{$info['add']}}
							</p>
						</div>						
						<div id="hoa-don">
							<h3>Customer's order</h3>							
							<table class="table-bordered table-responsive">
								<tr class="bold">
									<td width="30%">Product</td>
									<td width="25%">Price</td>
									<td width="20%">Quantity</td>
									<td width="15%">Total</td>
								</tr>
								@foreach($cart as $product)
								<tr>
									<td>{{$product->name}}</td>
									<td class="price">{{$product->price}} VNĐ</td>
									<td>{{$product->qty}}</td>
									<td class="price">{{$product->qty * $product->price}} VNĐ</td>
								</tr>
								@endforeach
								<tr>
									<td colspan="3">Total:</td>
									<td class="total-price">{{$total}} VNĐ</td>
								</tr>
							</table>
						</div>
						<div id="xac-nhan">
							<br>
							<p align="justify">
								<b>You have successfull ordered!</b><br />
								• Your products will be delivered to the above address in 2 or 3 business days.<br />
								• We will contact you before delivering.<br />
								<b><br />Thank you for using our services!</b>
							</p>
						</div>
					</div>					
					<!-- end main -->
</div>
