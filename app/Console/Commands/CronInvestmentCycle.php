<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User_investment;
use App\Wallet;
use App\Roi_history;
use DB;
use App\User;
use App\Transaction;
use Carbon\Carbon;

class CronInvestmentCycle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'day:invstComplete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        \Log::info("Cron is working fine!");
        
         $TodayDate = Carbon::now()->format('Y-m-d'); 
        // echo $TodayDate;   
        $UsersInvestment = User_investment::where('status',1)->get();
        $count = 0;
            if(count($UsersInvestment))
            {
                  foreach ($UsersInvestment as $key => $value) {
                    # code...
                     $dt = Carbon::parse($value->end_date);
                     $InvestmentEndData = $dt->format('Y-m-d');

                     if($TodayDate == $InvestmentEndData)
                     {
                    
                       User_investment::where('id',$value->id)->update(['status'=>2]);
                        $userWallet   = Wallet::where('user_id',$value->user_id)->first();
                        $walletUpdate = Wallet::find($userWallet->id);
                        $walletUpdate->balance = ($userWallet->balance + $value->roi_amount);
                        $walletUpdate->save();
                        
                        
                        
                              $usr = User::find($value->user_id);
                               $transaction = new Transaction();
                               $transaction->user_id = $value->user_id;
                               $transaction->email = $usr->email;
                               $transaction->user_type = $usr->role;
                               $transaction->plan_type = "";
                               $transaction->amount    = $value->roi_amount;
                               $transaction->balance   = $userWallet->balance + $value->roi_amount;
                               $transaction->processing_fee = 0;
                               $transaction->payment_method = "Wallet";
                               $transaction->payment_type = 3;// payout
                            //   $transaction->transaction_id = 'ROI'.date('YmdHis').$value->user_id;
                               $transaction->transaction_id = 'R'.date('ymdHis').'I'.$value->id.'U'.$value->user_id;
                               $transaction->payment_status = 1;
                               $transaction->save();

                        $roiHistory = new Roi_history();
                        $roiHistory->user_id = $value->user_id;
                        $roiHistory->user_investment_id = $value->id;
                        $roiHistory->save();



                        $count++;
                     }
                  }

          }

        // echo $count;
           $this->info('successfully');
    }
}
