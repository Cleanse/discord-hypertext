<?php
namespace Discord\Helpers;

use Discord\Discord;

class Mentions
{
    private static $userRegex;
    private static $channelRegex;

    /*public static function MentionHelper()
    {
        self::$userRegex = preg_match_all('/(^|\s)@([\w_\.]+)/', $thisIsAFunction, $matches);
        //self::$channelRegex = preg_match_all('/(^|\s)#([\w_\.]+)/', RegexOptions.Compiled);
        $matches = '@name kdfjd fkjd as@name @ lkjlkj @name';

        $text = preg_replace('/(^|\s)@([\w_\.]+)/', '$1<a href="/users/$2">@$2</a>', $matches);

        var_dump($text);
    }

    public static function ConvertToNames(Discord $client, $text)
	{
        $username = self::$userRegex->Replace($text, new MatchEvaluator(e =>
        {
            string id = e.Value.Substring(2, e.Value.Length - 3);
            var user = client.Users[id];
            if (user != null)
                return '@' + user.Name;
            else //User not found
                return e.Value;
        }));
			text = _channelRegex.Replace(text, new MatchEvaluator(e =>
			{
                string id = e.Value.Substring(2, e.Value.Length - 3);
				var channel = client.Channels[id];
				if (channel != null)
                    return channel.Name;
                else //Channel not found
                    return e.Value;
			}));
			return text;
		}

		public static IEnumerable<string> GetUserIds(string text)
		{
            return _userRegex.Matches(text)
            .OfType<Match>()
        .Select(x => x.Groups[1].Value)
				.Where(x => x != null);
		}*/
}