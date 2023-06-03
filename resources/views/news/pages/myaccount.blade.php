<x-news-layout>
    <div class="myaccount-container">
        <div class="myaccount-header">
            <h1 class="myaccount-title">My Account</h1>
            <div class="myaccount-logout">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">Sign out</button>
                </form>
            </div> 
        </div>
        <div class="myaccount-table">
            <div class="myaccount-data">
                <div class="myaccount-title">Username</div>
                <div class="myaccount-info">{{auth()->user()->name}}</div>
            </div>
            <div class="myaccount-data">
                <div class="myaccount-title">Email</div>
                <div class="myaccount-info">{{auth()->user()->email}}</div>
            </div>
            <div class="myaccount-data">
                <div class="myaccount-title">Subscription Expire Date</div>
                <div class="myaccount-info">{{auth()->user()->sub_expire}}</div>
            </div>
        </div>
    </div>
    
</x-news-layout>