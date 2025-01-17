DOCUMENTATION
=============

> IMPORTANT NOTICE: The API provider can be used with a debug flag and/or a
> logger with the following code:

```php
use Psr\Log\LoggerInterface;
use WBW\Library\Pexels\Provider\ApiProvider;

/** @var LoggerInterface $logger */
// $logger = ...

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY", $logger);
$provider->setDebug(true);
```

---

Search photos

```php
use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\SearchPhotosRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Search photos request.
$request = new SearchPhotosRequest();
$request->setQuery("YOUR QUERY");
$request->setOrientation("landscape"); // Optional
$request->setSize("large"); // Optional
$request->setLocale("en-US"); // Optional

// Call the API and get the response.
$response = $provider->searchPhotos($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

$response->getPerPage();
$response->getPage();
$response->getTotalResults();

$response->getPrevPage();
$response->getNextPage();

$response->getUrl();

/** @var Photo $current */
foreach($response->getPhotos() as $current) {

    $current->getId();
    $current->getWidth();
    $current->getHeight();
    $current->getUrl();
    
    $current->getPhotographer();
    $current->getPhotographerUrl();
    $current->getPhotographerId();
    
    /** @var Source src */
    $src = $current->getSrc();
    $src->getOriginal();
    $src->getLarge2x();
    $src->getLarge();
    $src->getMedium();
    $src->getSmall();
    $src->getPortrait();
    $src->getLandscape();
    $src->getTiny();
}
```

Curated photos

```php
use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\CuratedPhotosRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Curated photo request.
$request = new CuratedPhotosRequest();

// Call the API and get the response.
$response = $provider->curatedPhotos($request);

// Handle the response (same as search photos).
// ...
```

Get a photo

```php
use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\GetPhotoRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Get photo request.
$request = new GetPhotoRequest();
$request->setId(1234);

// Call the API and get the response.
$response = $provider->getPhoto($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

/** @var Photo $photo */
$photo = $response->getPhoto();
```

Search videos

```php
use WBW\Library\Pexels\Model\User;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\SearchVideosRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Search videos request.
$request = new SearchVideosRequest();
$request->setQuery("YOUR QUERY");
$request->setOrientation("landscape"); // Optional
$request->setSize("large"); // Optional
$request->setLocale("en-US"); // Optional

// Call the API and get the response.
$response = $provider->searchVideos($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

$response->getPerPage();
$response->getPage();
$response->getTotalResults();

$response->getPrevPage();
$response->getNextPage();

$response->getUrl();

/** @var Video $current */
foreach($response->getVideos() as $current) {
    
    $current->getId();
    $current->getWidth();
    $current->getHeight();
    $current->getUrl();
    
    $current->getImage();
    $current->getFullRes();
    $current->getDuration();
    
    /** @var User $user */
    $user = $current->getUser();
    $user->getId();
    $user->getName();
    $user->getUrl();

    /** @var VideoFile[] $videoFiles */
    $videoFiles = $current->getVideosFiles();
    foreach($videoFiles as $vf) {
    
        $vf->getId();
        $vf->getQuality();
        $vf->getFileType();
        $vf->getWidth();
        $vf->getHeight();
        $vf->getLink();
    }

    /** @var VideoPicture[] $videoPictures */
    $videoPictures = $current->getVideosPictures();
    foreach($videoPictures as $vp) {
    
        $vp->getId();
        $vp->getPicture();
        $vp->getNr();
    }
}
```

Popular videos

```php
use WBW\Library\Pexels\Model\User;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\PopularVideosRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Popular videos request.
$request = new PopularVideosRequest();

// Call the API and get the response.
$response = $provider->popularVideos($request);

// Handle the response (same as search videos).
// ...
```

Get a video

```php
use WBW\Library\Pexels\Model\User;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\GetVideoRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Get video request.
$request = new GetVideoRequest();
$request->setId(1234);

// Call the API and get the response.
$response = $provider->getVideo($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

/** @var Video $video */
$video = $response->getVideo();
```

Collections

```php
use WBW\Library\Pexels\Model\Collection;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\CollectionsRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Collections request.
$request = new CollectionsRequest();

// Call the API and get the response.
$response = $provider->collections($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

/** @var Collection $current */
foreach($response->getCollections() as $current) {

    $current->getId();
    $current->getTitle();
    $current->getDescription();
    $current->getPrivate();
    $current->getMediaCount();
    $current->getPhotosCount();
    $current->getVideosCount();
}
```

Collection

```php
use WBW\Library\Pexels\Model\AbstractMedia;
use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\CollectionRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Collection request.
$request = new CollectionRequest();
$request->setId("id");

// Call the API and get the response.
$response = $provider->collection($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

/** @var AbstractMedia $current */
foreach($response->getMedias() as $current) {

    if (true === ($current instanceof Photo)) {
        // same as search photos
    }

    if (true === ($current instanceof Video)) {
        // same as search videos
    }
}
```
