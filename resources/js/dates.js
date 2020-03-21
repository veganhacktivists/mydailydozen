import { format, isSameDay } from 'date-fns'

window.VH = window.VH || {}
window.VH.formatDate = format

window.VH.formatDateRange = (start, end) => {
  const startDate = new Date(start)
  const endDate = new Date(end)

  const formattedEnd = format(
    end,
    isSameDay(startDate, endDate) ? 'p' : 'PPPPp',
  )

  const formattedStart = format(start, 'PPPPp')
  if (formattedStart.slice(-2) === formattedEnd.slice(-2)) {
    return (
      formattedStart.substr(0, formattedStart.length - 2) + ` – ${formattedEnd}`
    )
  }

  return `${formattedStart} – ${formattedEnd}`
}

window.VH.formatTimeRange = (start, end) => {
  const formattedStart = format(start, 'p')
  const formattedEnd = format(end, 'p')

  if (formattedStart.slice(-2) === formattedEnd.slice(-2)) {
    return format(start, 'h:mm') + ` – ${formattedEnd}`
  }

  return `${formattedStart} – ${formattedEnd}`
}
