<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return array
     */
    public function discussArticle(Request $request)
    {
        $this->validate($request, $this->validateRule(), $this->validateMessages());
        $input = $request->all();
        $input['ip'] = $request->ip();
        if (Comment::create($input)) {
            return $this->successfulResponse(['评论成功!']);
        } else {
            return $this->successfulResponse(['评论失败!请联系站长。']);
        }
    }

    /**
     * @return array
     */
    protected function validateRule()
    {
        return [
            'nickname' => 'required|max:20',
            'email' => 'required|email|max:60',
            'content' => 'required|max:420',
        ];
    }

    /**
     * @return array
     */
    protected function validateMessages()
    {
        return [
            'nickname.required' => '昵称 不能为空。',
            'nickname.max' => '昵称 不能大于 20 个字符。',
            'content.required' => '评论内容 不能为空。',
            'content.max' => '评论内容 不能大于 420 个字符。',
        ];
    }

    /**
     * @param $articleId
     * @return array
     */
    public function getComments($articleId): array
    {
        $commentsCount = 0;
        $articleComments = [];
        $comments = Comment::where('target', $articleId)->get();
        if (!$comments->isEmpty()) {
            $articleComments = $comments->each(function ($v, $k) {
                $v['comment_time'] = Carbon::parse($v['created_at'])->diffForHumans();
                $v['floor'] = $k + 1;
                return $v;
            })->toArray();
            $commentsCount = $comments->count();
        }
        return [$commentsCount, $articleComments];
    }
}
