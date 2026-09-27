<?php

namespace App\Http\Controllers;

use App\Models\DetailType;
use Illuminate\Http\Request;

class DetailTypeController extends Controller
{
    public function store(Request $request)
    {
        $request->merge(['video' => $this->embedUrl((string) $request->input('video'))]);
        $this->validate($request, [
            'groupId' => 'required|exists:groups,id',
            'name' => 'required',
            'video' => ['required', 'regex:#^https://www\.youtube(-nocookie)?\.com/embed/[\w-]{11}(\?[^\s"]*)?$#'],
            'info' => 'required',
        ]);

        DetailType::create([
            'group_id' => $request->groupId,
            'name' => $request->name,
            'video' => $request->video,
            'info' => $request->info,
        ]);

        return redirect('groups/' . $request->groupId);
    }

    public function update(Request $request, $detailTypeId)
    {
        $request->merge(['video' => $this->embedUrl((string) $request->input('video'))]);
        $this->validate($request, [
            'name' => 'required',
            'video' => ['required', 'regex:#^https://www\.youtube(-nocookie)?\.com/embed/[\w-]{11}(\?[^\s"]*)?$#'],
            'info' => 'required',
        ]);

        $detailType = DetailType::findOrFail($detailTypeId);

        $detailType->name = $request->name;
        $detailType->video = $request->video;
        $detailType->info = $request->info;
        $detailType->save();

        return redirect('groups/' . $detailType->group_id);
    }

    public function destroy(Request $request, $detailTypeId)
    {
        $detailType = DetailType::findOrFail($detailTypeId);

        if ($detailType->group->detailTypes()->count() > 1) {
            $detailType->delete();
        }

        return redirect('groups/' . $detailType->group_id);
    }

    // youtube.com/watch?v=…, youtu.be/… and /shorts/… links become the /embed/ URL the page's iframe needs
    private function embedUrl(string $url): string
    {
        return preg_match('#^https?://(?:www\.|m\.)?(?:youtube\.com/(?:watch\?(?:[^\s]*&)?v=|shorts/)|youtu\.be/)([\w-]{11})#', $url, $match)
            ? "https://www.youtube.com/embed/{$match[1]}"
            : $url;
    }
}
