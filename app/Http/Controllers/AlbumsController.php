<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Libraries\Functions;

class AlbumsController extends AdminController
{
    function getsllalbums(Request $request)
    {
        $dbdata = DB::table('aldums')
            ->leftJoin('singer_group', 'group_id', '=', 'singer_group.id')->leftJoin('contry', 'contry.id', '=', 'singer_group.group_contry_id')->select('*')->get();

        $postdata = [];
        foreach ($dbdata as $rowdata) {
            if (!array_key_exists($rowdata->coontry_code,  $postdata)) {
                $singertitle = $rowdata->coontry_code .= 'singer';
                $postdata[$singertitle] = [];
            }
            $postdata[$rowdata->coontry_code][] = [
                'id' => $rowdata->id,
                'aldum_name' => $rowdata->aldum_name,
                'release_time' => $rowdata->release_time,
                'aldums_url' => $rowdata->aldums_url,
                'group_name' => $rowdata->group_name,
                'group_brith_year' => $rowdata->group_brith_year,
            ];
        }
        return $this->presenter->json($postdata, "成功", 1);
    }

    function getalbums(Request $request)
    {
        $input = \request()->all();

        $this->validate($request, [
            'albums_id' => 'required',
        ]);


        $url = $this->kkoxrul . '/albums/' . $input['albums_id'];
        $token = $this->kkox_token['access_token'];
        $header = array("Authorization: Bearer $token");
        $postdata = [
            'territory' => 'TW'
        ];
        $posturl = $url . '?' . http_build_query($postdata);
        $albums_result = Functions::curl_post($posturl, '', '', 'get', $header);
        return $this->presenter->json($albums_result, "成功", 1);
    }
    function getHotAlbums()
    {
        $url = $this->kkoxrul . '/new-release-categories';
        $token = $this->kkox_token['access_token'];
        $header = array("Authorization: Bearer $token");
        $postdata = [
            'territory' => 'TW',
            'limit' => 10
        ];
        $posturl = $url . '?' . http_build_query($postdata);
        $hot_result = Functions::curl_post($posturl, '', '', 'get', $header);
        $categories_albums = [];
        foreach ($hot_result['data'] as $album_list) {
            if (in_array($album_list['title'], ['華語', '西洋', '韓語', '日語'])) {
                $url = $this->kkoxrul . '/new-release-categories/' . $album_list['id'] . '/albums';
                $postdata = [
                    'territory' => 'TW',
                    'limit' => 5
                ];
                $posturl = $url . '?' . http_build_query($postdata);
                $albums = Functions::curl_post($posturl, '', '', 'get', $header);
                $code = $this->change_lang_code($album_list['title']);
                foreach ($albums['data'] as $ablumsdata) {
                    $categories_albums[$code][] = array(
                        'aldums_id' => $ablumsdata['id'],
                        'aldum_name' => $ablumsdata['name'],
                        'release_time' =>  $ablumsdata['release_date'],
                        'aldums_url' =>  $ablumsdata['url'],
                        'img_url' => $ablumsdata['images'][1]['url'],
                        'artist_id' =>  $ablumsdata['artist']['id'],
                        'artist_name' =>  $ablumsdata['artist']['name'],
                        'artist_img' => $ablumsdata['artist']['images'][0]['url']
                    );
                }
            }
        }
        return $this->presenter->json($categories_albums, "成功", 1);
    }
    private function change_lang_code($title)
    {
        $code = 'CH';
        switch ($title) {
            case '華語':
                $code = 'CH';
                break;
            case '西洋':
                $code = 'WEST';
                break;
            case '日語':
                $code = 'JP';
                break;
            case '韓語':
                $code = 'KOREA';
                break;
            default:
                $code = 'CH';
        }
        return $code;
    }
}
