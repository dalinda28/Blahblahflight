<x-base-layout>
    <div class="flex-1 bg-gray-50">
        <div class="flex flex-col mx-auto max-w-7xl gap-2 py-8">
            <h1 class="text-2xl font-semibold">Process reservation</h1>
            <h2>Book Flight Number : {{ $flight->flightNumber }} -  ({{ $flight->price }}€ / sit)</h2>
        
            <h2 class="mt-1">{{ Auth::user()->name }}, fill this form to prepare your Flight :</h2>
            <div>
                <form
                    id="form"
                    action="{{ route('confirmBooking', [
                        'flightId' => $flight->id,
                        'passengerId' => Auth::id()
                    ])}}"
                    method="POST">
                    @csrf

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
                    <div class="grid grid-cols-2 mt-4">
            
                        <div class="flex flex-col gap-2">
                            <label for="passengers">Number of passengers</label>
                            <input name="passengers" id="passengers" type="number" min="0" placeholder="ex : 5">
                            <input type="hidden" id="price" value="{{ $flight->price }}">
                        </div>
            
                    </div>
            
                    <div class="grid grid-cols-2 mt-4">
            
                        <div class="flex flex-col gap-2">
                            <label for="comment">Comment</label>
                            <input name="comment" id="comment" type="text" placeholder="ex : I have a poney with me">
                        </div>
            
                    </div>

                    <div class="grid grid-cols-2 mt-4">
            
                        <div class="flex flex-col gap-2">
                            <label for="card-holder-name">Card holder name</label>
                            <input name="card-holder-name" id="card-holder-name" type="text" >
                        </div>
            
                    </div>

                    <input type="hidden" id="payment_method" name="payment_method">
            
            
                    <div class="grid grid-cols-2 mt-4">
                        <div class="flex flex-col gap-2">
                            <label for="comment">Card number</label>
                            <div  id="card-element"></div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 mt-4">
                        <div class="flex items-center justify-between mt-4">
                            <p id="amount"> </p>
                            <div class="flex gap-4">
                                <a href="{{ route('main', request()->all() ) }}" class="btn btn-active">Back</a>
                                <button id="card-button" type="button" class="btn">Validade and process payment</button>
                            </div>
                        </div>
                    </div>
            
                </form>
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style='color:red;'>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
            </div>
        </div>
    </div>
<script src="https://js.stripe.com/v3/"></script>
 
<script>

    const passengersNumber = document.getElementById('passengers')
    const amount = document.getElementById('amount')
    const price = parseFloat(document.getElementById('price').value).toFixed(2)

    passengersNumber.addEventListener('change', () => {
        const n = passengersNumber.value ?? 0
        const total = price * n
        console.log(total)
        if(total){
            amount.innerText = 'Total : ' + total.toFixed(2) + ' €'
        } else {
            amount.innerText = ''
        }
    })

    const stripe = Stripe(" {{ env('STRIPE_KEY') }} ");
 
    const elements = stripe.elements();
    const cardElement = elements.create('card', {
        classes: {
            base: 'StripeElement border border-gray-700 bg-white  px-2 py-3'
        }
    });
 
    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');

    const cardButton = document.getElementById('card-button');
    
    cardButton.addEventListener('click', async (e) => {
        e.preventDefault()

        const { paymentMethod, error } = await stripe.createPaymentMethod('card', cardElement);
    
        if (error) {
            alert(error)
        } else {
            document.getElementById('payment_method').value = paymentMethod.id
        }

        document.getElementById('form').submit()
    });
</script>
</x-base-layout>
