<style>
    .profile_img{
        display: flex;
        justify-content: center;
    }
    .student_simg{
        display: flex;
        justify-content: center;
    }
    .name_title h4{
        font-size: 14px;
        font-weight: 500;
    }
    .text{
        border-top: 1px solid #817e7e21;
        
    } 
    .text h4{
        border-bottom: 1px solid #817e7e21;
        padding-bottom: 7px;
        padding-top: 5px;
        font-size: 14px;
        font-weight: 400;
    }
    .text h4:last-child{
        border-bottom: none;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="school_name">
            <h2 class="text-center">{{ DB::table('schools')->where('id', auth()->user()->school_id)->value('title') }}</h2>
        </div>
    </div>
</div>

<section class="studnt_profile">
    <div class="container"> 
      <div class="row">
        <div class="col-lg-4">
          <div class="profile_img">
              <div class="test_div">
                  <div class="student_simg">
                      <img src="{{ $user_details['photo'] }}" class="rounded-circle div-sc-five">
                  </div>
                  <div class="name_title mt-3">
                      <h4>{{ get_phrase('Name') }} : {{ $user_details['name'] }}</h4>
                      <h4>{{ get_phrase('Email') }} : {{ null_checker($user_details['email']) }}</h4>
                      
                  </div>
              </div>
          </div>
      </div>
        <div class="col-lg-8">
          <div class="text name_title text-center">
              <h4>{{ get_phrase('Name') }} : {{ $user_details['name'] }}</h4>
              <h4>{{ get_phrase('Gender') }} : {{ null_checker($user_details['gender']) }}</h4>
              <h4>{{ get_phrase('Address') }} : {{ null_checker($user_details['address']) }}</h4>
              <h4>{{ get_phrase('Blood') }} : {{ null_checker(strtoupper($user_details['blood_group'])) }}</h4>
              <h4>{{ get_phrase('Contact') }} : {{ null_checker($user_details['phone']) }}</h4>
          </div>
        </div>
      </div>
    </div>
</section>
