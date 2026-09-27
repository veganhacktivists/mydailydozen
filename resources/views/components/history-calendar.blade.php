<div x-data="historyCalendar()" x-cloak class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-200 sm:p-6">
  <div class="flex items-center justify-between">
    <h2 class="text-lg">
      <span class="font-bold text-gray-900" x-text="MONTH_NAMES[month]"></span>
      <span class="text-gray-500" x-text="year"></span>
    </h2>
    <div class="flex gap-1">
      <button type="button" x-bind:title="previousMonthTitle()" x-bind:aria-label="previousMonthTitle()" x-on:click="previousMonth()"
        class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-pine-500">
        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button type="button" x-bind:title="nextMonthTitle()" x-bind:aria-label="nextMonthTitle()" x-on:click="nextMonth()" x-bind:disabled="isCurrentMonth()"
        class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-pine-500 disabled:pointer-events-none disabled:opacity-30">
        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>
  </div>

  <div class="mt-4 grid grid-cols-7 gap-1">
    <template x-for="day in DAYS" :key="day">
      <div class="pb-2 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
        <span class="sm:hidden" x-text="day[0]"></span><span class="hidden sm:inline" x-text="day"></span>
      </div>
    </template>

    <template x-for="blank in blankdays" :key="'blank' + blank">
      <div></div>
    </template>

    <template x-for="date in no_of_days" :key="'day' + date">
      <div class="flex h-16 flex-col items-center rounded-xl p-1 sm:h-24 sm:p-2"
        :class="isToday(date) && 'bg-pine-50 ring-1 ring-pine-300'">
        <span class="self-center text-sm leading-6 sm:self-start"
          :class="isToday(date) ? 'font-bold text-pine-700' : isFuture(date) ? 'text-gray-300' : 'text-gray-700'"
          x-text="date"></span>
        <template x-if="!isFuture(date)">
          <svg class="mt-1 size-7 sm:mt-0 sm:size-10" viewBox="0 0 36 36" role="img" :aria-label="label(date)">
            <title x-text="label(date)"></title>
            <g x-show="status(date) === 'complete'">
              <circle cx="18" cy="18" r="17" class="fill-pine-600" />
              <path d="M11.5 18.5l4.5 4.5 8.5-9" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </g>
            <g x-show="status(date) === 'partial'">
              <circle cx="18" cy="18" r="15.9155" fill="none" stroke-width="4" class="stroke-amber-100" />
              <circle cx="18" cy="18" r="15.9155" fill="none" stroke-width="4" stroke-linecap="round" class="stroke-amber-500"
                transform="rotate(-90 18 18)" :stroke-dasharray="percent(date) + ' 100'" />
            </g>
            <circle x-show="status(date) === 'missed'" cx="18" cy="18" r="15.9155" stroke-width="2" class="fill-red-50 stroke-red-400" />
            <circle x-show="status(date) === 'none'" cx="18" cy="18" r="15.9155" fill="none" stroke-width="2" stroke-dasharray="3 3" class="stroke-gray-200" />
          </svg>
        </template>
      </div>
    </template>
  </div>
</div>

<script>
  const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  const EVENTS = {!! $history !!}; // [{year: "2020", month: "12", day: "08", count: 18, total: 24}, ...]
  const EVENTS_BY_DATE = Object.fromEntries(EVENTS.map(e => [`${+e.year}-${+e.month}-${+e.day}`, e]));

  function historyCalendar() {
    const today = new Date();

    return {
      month: today.getMonth(),
      year: today.getFullYear(),
      no_of_days: 0,
      blankdays: 0,

      init() {
        this.getNoOfDays();
      },

      isToday(date) {
        return new Date(this.year, this.month, date).toDateString() === today.toDateString();
      },

      isFuture(date) {
        return new Date(this.year, this.month, date) > today;
      },

      isCurrentMonth() {
        return this.year === today.getFullYear() && this.month === today.getMonth();
      },

      event(date) {
        return EVENTS_BY_DATE[`${this.year}-${this.month + 1}-${date}`];
      },

      status(date) {
        const event = this.event(date);
        if (event === undefined || !event.total || (this.isToday(date) && event.count === 0)) return 'none';
        if (event.count >= event.total) return 'complete';
        if (event.count > 0) return 'partial';
        return 'missed';
      },

      percent(date) {
        const event = this.event(date);
        return event?.total ? Math.min(100, event.count / event.total * 100) : 0;
      },

      label(date) {
        const event = this.event(date);
        return event?.total ? `${event.count} / ${event.total}` : '–';
      },

      nextMonth() {
        if (this.isCurrentMonth()) return;
        [this.year, this.month] = this.month === 11 ? [this.year + 1, 0] : [this.year, this.month + 1];
        this.getNoOfDays();
      },

      previousMonth() {
        [this.year, this.month] = this.month === 0 ? [this.year - 1, 11] : [this.year, this.month - 1];
        this.getNoOfDays();
      },

      nextMonthTitle() {
        return MONTH_NAMES[(this.month + 1) % 12] + ' ' + (this.month === 11 ? this.year + 1 : this.year);
      },

      previousMonthTitle() {
        return MONTH_NAMES[(this.month + 11) % 12] + ' ' + (this.month === 0 ? this.year - 1 : this.year);
      },

      getNoOfDays() {
        this.no_of_days = new Date(this.year, this.month + 1, 0).getDate();
        this.blankdays = new Date(this.year, this.month).getDay();
      },
    };
  }
</script>
