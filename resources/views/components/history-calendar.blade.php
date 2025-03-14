<div>
  <div class="antialiased sans-serif bg-gray-100">
    <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="flex items-center justify-between py-2 px-6">
          <div>
            <span class="text-lg font-bold text-gray-800" x-text="MONTH_NAMES[month]">

            </span>
            <span class="text-lg text-gray-600 font-normal" x-text="year">

            </span>
          </div>
          <div class="border rounded-lg px-1" style="padding-top: 2px;">
            <button type="button" x-bind:title="previousMonthTitle()"
              class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center"
              x-on:click="previousMonth()">
              <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
            </button>
            <div class="border-r inline-flex h-6"></div>
            <button type="button" x-bind:title="nextMonthTitle()"
              class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1"
              x-on:click="nextMonth()">
              <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
        </div>

        <div class="-mx-1 -mb-1">
          <div class="flex flex-wrap" style="margin-bottom: -40px;">
            <template x-for="(day, index) in DAYS" :key="index">
              <div style="width: 14.26%" class="px-2 py-2">
                <div x-text="day" class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
              </div>
            </template>
          </div>

          <div class="flex flex-wrap border-t border-l">
            <template x-if="blankdays > 0">
              <template x-for="blankday in blankdays" :key="'blankday' + blankday">
                <div style="width: 14.28%; height: 120px" class="text-center border-r border-b px-4 pt-2">
                </div>
              </template>

            </template>
            <template x-for="date in no_of_days" :key="'day' + date">
              <div style="width: 14.28%; height: 120px" class="px-4 pt-2 border-r border-b relative">
                <div x-text="date"
                  style="font-size: 15px;padding: 5px 6px 6px 4px;"
                  class="pointer-events-none inline-flex w-6 h-6 items-center justify-center text-center leading-none rounded-full transition ease-in-out duration-100"
                  :class="{'bg-blue-500 text-white': isToday(year, month, date) == true, 'text-gray-700': isToday(year, month, date) == false }">
                </div>
                <div style="height: 80px;padding-top: 10px;" class="overflow-y-auto mt-1">
                  <div x-show="isFuture(year, month, date) == false"
                    class="flex items-center justify-center rounded-full text-2xl"
                    style="height: 40px; width: 40px;margin: auto;font-size: 20px;" :class="{
                      'bg-pine-100 text-pine-600 border-pine-600': (findEvent(year, month, date)?.count || 0) == findEvent(year, month, date)?.total,
                      'bg-yellow-100 text-yellow-500 border border-yellow-500': (findEvent(year, month, date)?.count || 0) > 0,
                      'bg-red-100 text-red-500 border border-red-500': (findEvent(year, month, date)?.count) == 0,
                      'bg-gray-100 text-gray-300 border border-gray-300': (findEvent(year, month, date)?.count) === undefined,
                    }">
                  </div>
                </div>
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>

    <script>
      const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
      const EVENTS = JSON.parse('{!! $history !!}'); // [{year: 2020, month: 12, day: 8, count: 18}, ...]

      function app() {
        return {
          month: '',
          year: '',
          no_of_days: -1,
          blankdays: -1,
          days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

          initDate() {
            let today = new Date();
            this.month = today.getMonth();
            this.year = today.getFullYear();
            this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
          },

          isToday(year, month, day) {
            const today = new Date();
            const d = new Date(year, month, day);

            return today.toDateString() === d.toDateString() ? true : false;
          },

          isFuture(year, month, day){
            const today = new Date();
            const d = new Date(year, month, day);

            return today.valueOf() < d.valueOf();
          },

          nextMonth(){
            if(this.month == 11){
              this.year++
              this.month = 0
            }else{
              this.month++
            }
            this.getNoOfDays()
          },

          previousMonth(){
            if(this.month == 0){
              this.year--
              this.month = 11
            }else{
              this.month--
            }
            this.getNoOfDays()
          },

          nextMonthTitle(){
            return MONTH_NAMES[(this.month+1) % 12] + ' ' + (this.month == 11 ? this.year + 1 : this.year)
          },

          previousMonthTitle(){
            return MONTH_NAMES[(this.month + 11) % 12] + ' ' + (this.month == 0 ? this.year - 1 : this.year)
          },

          getNoOfDays() {
            this.no_of_days = new Date(this.year, this.month + 1, 0).getDate();
            this.blankdays = new Date(this.year, this.month).getDay();
          },

          findEvent(year, month, date) {
            return EVENTS.find(e => e.year == year && e.month == month + 1 && e.day == date)
          }
        }
      }
    </script>
  </div>