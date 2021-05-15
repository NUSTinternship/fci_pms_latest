<?php

namespace Faker\Provider\ar_JO;

class Address extends \Faker\Provider\Address
{
    protected static $streetPrefix = ['شارع'];

    protected static $cityPrefix = ['شمال', 'شرق', 'غرب', 'جنوب', 'وسط', ];

    /**
     * @link http://ar.wikipedia.org/wiki/%D9%85%D9%84%D8%AD%D9%82:%D9%82%D8%A7%D8%A6%D9%85%D8%A9_%D9%85%D8%AF%D9%86_%D8%A7%D9%84%D8%A3%D8%B1%D8%AF%D9%86
     */
    protected static $cityName = [
        'اربد', 'أبو نصير', 'الجبيهه', 'الحصن', 'الرصيفة', 'الرمثا', 'الزرقاء', 'السلط', 'الشهيد عزمي', 'الصريح', 'الضليل', 'الطفيلة', 'العقبة',     'القويسمة', 'الكرك', 'المشارع', 'المفرق', 'الهاشمية', 'ام قصير', 'ايدون',
        'بيت راس',
        'تلاع العلي',
        'جرش',
        'ساكب', 'سحاب',
        'شفا بدران',
        'صويلح',
        'عمان', 'عنجره', 'عين الباشا',
        'غور الصافي',
        'كريمه', 'كفرنجه',
        'مادبا', 'مخيم البقعه', 'مخيم حطين', 'مرج الحمام', 'معان',
        'ناعور',
        'وادي السير',
    ];

    protected static $buildingNumber = ['%####', '%###', '%#'];

    protected static $postcode = ['#####', '#####-####'];

    /**
     * @link http://ar.wikipedia.org/wiki/%D9%85%D9%84%D8%AD%D9%82:%D9%82%D8%A7%D8%A6%D9%85%D8%A9_%D8%A7%D9%84%D9%88%D9%84%D8%A7%D9%8A%D8%A7%D8%AA_%D8%A7%D9%84%D8%A3%D9%85%D8%B1%D9%8A%D9%83%D9%8A%D8%A9_%D8%AD%D8%B3%D8%A8_%D8%A7%D9%84%D9%85%D8%B3%D8%A7%D8%AD%D8%A9
     */
    protected static $state = [
        'آيوا', 'أركنساس', 'أريزونا', 'ألاباما', 'ألاسكا', 'أوريغون', 'أوكلاهوما', 'أوهايو', 'أيداهو', 'إلينوي', 'إنديانا', 'الاباما', 'الجزر العذراء الأمريكية',
        'بنس    يلفانيا', 'بورتو ريكو',
        'تكساس', 'تينيسي',
        'جزر ماريانا الشمالية', 'جورجيا',
        'داكوتا الجنوبية', 'داكوتا الشمالية', 'ديلاوير', 'رود آيلاند',
        'ساموا الأمريكية',
        'غوام',
        'فرجينيا الغربية', 'فلوريدا', 'فيرجينيا', 'فيرجينيا الغربية', 'فيرمونت',
        'كارولاينا الجنوبية', 'كارولاينا الشمالية', 'كارولينا الشمالية', 'كاليفورنيا', 'كانساس', 'كنتاكي', 'كولورادو', 'كونيتيكت',
        'لويزيانا',
        'ماريلاند', 'ماساتشوستس', 'ماين', 'مسيسيبي', 'مونتانا', 'ميريلاند', 'ميزوري', 'ميشيغان', 'مين', 'مينيسوتا',
        'نبراسكا', 'نيفادا', 'نيو جيرسي', 'نيو ميكسيكو', 'نيوهامشير', 'نيويورك',
        'هاواي',
        'واشنطن', 'وايومنغ', 'ويسكنسن', 'يوتا',
    ];

    protected static $stateAbbr = [
        'AK', 'AL', 'AR', 'AZ', 'CA', 'CO', 'CT', 'DC', 'DE', 'FL', 'GA', 'HI', 'IA', 'ID', 'IL', 'IN', 'KS', 'KY', 'LA', 'MA', 'MD', 'ME', 'MI', 'MN', 'MO', 'MS', 'MT', 'NC', 'ND', 'NE', 'NH', 'NJ', 'NM', 'NV', 'NY', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VA', 'VT', 'WA', 'WI', 'WV', 'WY'
    ];

    /**
     * @link http://www.nationsonline.org/oneworld/countrynames_arabic.htm
     */
    protected static $country = [
        'الكاريبي', 'أمريكا الوسطى', 'أنتيجوا وبربودا', 'أنجولا', 'أنجويلا', 'أندورا', 'اندونيسيا', 'أورجواي', 'أوروبا', 'أوزبكستان', 'أوغندا', 'أوقيانوسيا', 'أوقيانوسيا النائية', 'أوكرانيا', 'ايران', 'أيرلندا', 'أيسلندا', 'ايطاليا',
        'بابوا غينيا الجديدة', 'باراجواي', 'باكستان', 'بالاو', 'بتسوانا', 'بتكايرن', 'بربادوس', 'برمودا', 'بروناي', 'بلجيكا', 'بلغاريا', 'بليز', 'بنجلاديش', 'بنما', 'بنين', 'بوتان', 'بورتوريكو', 'بوركينا فاسو', 'بوروندي', 'بولندا', 'بوليفيا', 'بولينيزيا', 'بولينيزيا الفرنسية', 'بيرو',
        'تانزانيا', 'تايلند', 'تايوان', 'تركمانستان', 'تركيا', 'ترينيداد وتوباغو', 'تشاد', 'توجو', 'توفالو', 'توكيلو', 'تونجا', 'تونس', 'تيمور الشرقية',
        'جامايكا', 'جبل طارق', 'جرينادا', 'جرينلاند', 'جزر الأنتيل الهولندية', 'جزر الترك وجايكوس', 'جزر القمر', 'جزر الكايمن', 'جزر المارشال', 'جزر الملديف', 'جزر الولايات المتحدة البعيدة الصغيرة', 'جزر أولان', 'جزر سليمان', 'جزر فارو', 'جزر فرجين الأمريكية', 'جزر فرجين البريطانية', 'جزر فوكلاند', 'جزر كوك', 'جزر كوكوس', 'جزر ماريانا الشمالية', 'جزر والس وفوتونا', 'جزيرة الكريسماس', 'جزيرة بوفيه', 'جزيرة مان', 'جزيرة نورفوك', 'جزيرة هيرد وماكدونالد', 'جمهورية افريقيا الوسطى', 'جمهورية التشيك', 'جمهورية الدومينيك', 'جمهورية الكونغو الديمقراطية', 'جمهورية جنوب افريقيا', 'جنوب آسيا', 'جنوب أوروبا', 'جنوب شرق آسيا', 'جنوب وسط آسيا', 'جواتيمالا', 'جوادلوب', 'جوام', 'جورجيا', 'جورجيا الجنوبية وجزر ساندويتش الجنوبية', 'جيبوتي', 'جيرسي',
        'دومينيكا',
        'رواندا', 'روسيا', 'روسيا البيضاء', 'رومانيا', 'روينيون',
        'زامبيا', 'زيمبابوي',
        'ساحل العاج', 'ساموا', 'ساموا الأمريكية', 'سانت بيير وميكولون', 'سانت فنسنت وغرنادين', 'سانت كيتس ونيفيس', 'سانت لوسيا', 'سانت مارتين', 'سانت هيلنا', 'سان مارينو', 'ساو تومي وبرينسيبي', 'سريلانكا', 'سفالبارد وجان مايان', 'سلوفاكيا', 'سلوفينيا', 'سنغافورة', 'سوازيلاند', 'سوريا', 'سورينام', 'سويسرا', 'سيراليون', 'سيشل',
        'شرق آسيا', 'شرق افريقيا', 'شرق أوروبا', 'شمال افريقيا', 'شمال أمريكا', 'شمال أوروبا', 'شيلي',
        'صربيا', 'صربيا والجبل الأسود',
        'طاجكستان',
        'عمان',
        'غامبيا', 'غانا', 'غرب آسيا', 'غرب افريقيا', 'غرب أوروبا', 'غويانا', 'غيانا', 'غينيا', 'غينيا الاستوائية', 'غينيا بيساو',
        'فانواتو', 'فرنسا', 'فلسطين', 'فنزويلا', 'فنلندا', 'فيتنام', 'فيجي',
        'قبرص', 'قرغيزستان', 'قطر',
        'كازاخستان', 'كاليدونيا الجديدة', 'كرواتيا', 'كمبوديا', 'كندا', 'كوبا', 'كوريا الجنوبية', 'كوريا الشمالية', 'كوستاريكا', 'كولومبيا', 'كومنولث الدول المستقلة', 'كيريباتي', 'كينيا',
        'لاتفيا', 'لاوس', 'لبنان', 'لوكسمبورج', 'ليبيا', 'ليبيريا', 'ليتوانيا', 'ليختنشتاين', 'ليسوتو',
        'مارتينيك', 'ماكاو الصينية', 'مالطا', 'مالي', 'ماليزيا', 'مايوت', 'مدغشقر', 'مصر', 'مقدونيا', 'ملاوي', 'منغوليا', 'موريتانيا', 'موريشيوس', 'موزمبيق', 'مولدافيا', 'موناكو', 'مونتسرات', 'ميانمار', 'ميكرونيزيا', 'ميلانيزيا',
        'ناميبيا', 'نورو', 'نيبال', 'نيجيريا', 'نيكاراجوا', 'نيوزيلاندا', 'نيوي',
        'هايتي', 'هندوراس', 'هولندا', 'هونج كونج الصينية',
        'وسط آسيا', 'وسط افريقيا',
    ];

    protected static $cityFormats = [
        '{{cityPrefix}} {{cityName}}',
        '{{cityName}}',
    ];

    protected static $streetNameFormats = [
        '{{streetPrefix}} {{firstName}} {{lastName}}',
    ];

    protected static $streetAddressFormats = [
        '{{buildingNumber}} {{streetName}}',
        '{{buildingNumber}} {{streetName}} {{secondaryAddress}}',
    ];

    protected static $addressFormats = [
        "{{streetAddress}}\n{{city}}",
    ];

    protected static $secondaryAddressFormats = ['شقة رقم. ##', 'بناية رقم ##'];

    /**
     * @example 'شرق'
     */
    public static function cityPrefix()
    {
        return static::randomElement(static::$cityPrefix);
    }

    /**
     * @example 'عمان'
     */
    public static function cityName()
    {
        return static::randomElement(static::$cityName);
    }

    /**
     * @example 'شارع'
     */
    public static function streetPrefix()
    {
        return static::randomElement(static::$streetPrefix);
    }

    /**
     * @example 'شقة رقم. 350'
     */
    public static function secondaryAddress()
    {
        return static::numerify(static::randomElement(static::$secondaryAddressFormats));
    }

    /**
     * @example 'كاليفورنيا'
     */
    public static function state()
    {
        return static::randomElement(static::$state);
    }

    /**
     * @example 'CA'
     */
    public static function stateAbbr()
    {
        return static::randomElement(static::$stateAbbr);
    }
}
