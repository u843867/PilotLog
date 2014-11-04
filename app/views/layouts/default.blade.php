<!doctype html>
<html>
<head>
    
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/mycss.css') }}
    
    <meta charset="utf-8">
    
    <title>Pilot Log</title>
        
 </head>   
        
   
    <body>
        
        <div class="container-fluid">
          <div class="row">   
            <div id="header-container">
            
                <div id="logo">
                    {{ HTML::image('../images/logo7.png', 'logo') }}
                    
                </div>    
                
<!--                <div id="logo-name">
                    <h2>PilotLog</h2>
                </div>                 -->
<!--                <div class="col-sm-2 center-block">
                    
                    
                </div>-->
                
             </div> 
            
            
                <div id="nav-pills">
                     <ul class="nav nav-pills" role="tablist">
    <!--                     <li role="presentation" class="active"><a href="{{ URL::route('flights.create') }}">Create Flight</a></li>-->
                         <li> {{ HTML::clever_link("flights/create", 'Create Flight') }} </li>
    <!--                     <li role="presentation"><a href="{{ URL::route('flights.index') }}">View Flights</a></li>-->
                         <li> {{ HTML::clever_link("flights", 'View Flights') }} </li>

                        @if (Auth::check())   
                         <li> {{ HTML::clever_link("logout", 'logout') }} </li>
                        @endif
                 
                    </ul> 
                    
                </div>                

        
             
            
                <div class="col-xs-12 center-block"> 
                
                    <div id="content">
                    @yield('content')
                    </div>

                </div>
            </div>
        </div>
    
    </body>
    

</html>

